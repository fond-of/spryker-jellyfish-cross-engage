<?php

namespace FondOfSpryker\Zed\JellyfishCrossEngage\Business\JellyfishCrossEngage;

use FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToLocaleFacadeInterface;
use FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToProductCategoryFacadeInterface;
use FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToProductFacadeInterface;
use FondOfSpryker\Zed\JellyfishCrossEngage\JellyfishCrossEngageConfig;
use Generated\Shared\Transfer\CategoryCollectionTransfer;
use Generated\Shared\Transfer\JellyfishOrderItemTransfer;

class JellyfishCrossEngageReader implements JellyfishCrossEngageReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToProductCategoryFacadeInterface
     */
    protected $productCategoryFacade;

    /**
     * @var \FondOfSpryker\Zed\JellyfishCrossEngage\JellyfishCrossEngageConfig
     */
    protected $config;

    /**
     * @var \FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToLocaleFacadeInterface
     */
    protected $localeFacade;

    /**
     * @param \FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToProductFacadeInterface $productFacade
     * @param \FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToProductCategoryFacadeInterface $productCategoryFacade
     * @param \FondOfSpryker\Zed\JellyfishCrossEngage\JellyfishCrossEngageConfig $config
     * @param \FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToLocaleFacadeInterface $localeFacade
     */
    public function __construct(
        JellyfishCrossEngageToProductFacadeInterface $productFacade,
        JellyfishCrossEngageToProductCategoryFacadeInterface $productCategoryFacade,
        JellyfishCrossEngageConfig $config,
        JellyfishCrossEngageToLocaleFacadeInterface $localeFacade
    ) {
        $this->productFacade = $productFacade;
        $this->productCategoryFacade = $productCategoryFacade;
        $this->config = $config;
        $this->localeFacade = $localeFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\JellyfishOrderItemTransfer $jellyfishOrderItemTransfer
     *
     * @return string|null
     */
    public function getGender(JellyfishOrderItemTransfer $jellyfishOrderItemTransfer): ?string
    {
        $productConcreteTransfer = $this->productFacade->getProductConcrete($jellyfishOrderItemTransfer->getSku());

        $attributes = $this->productFacade->getCombinedConcreteAttributes($productConcreteTransfer);

        return $attributes ? $attributes['gender'] ?? null : null;
    }

    /**
     * @param \Generated\Shared\Transfer\JellyfishOrderItemTransfer $jellyfishOrderItemTransfer
     *
     * @return string
     */
    public function getCategories(JellyfishOrderItemTransfer $jellyfishOrderItemTransfer): ?string
    {
        $localeTransfer = $this->localeFacade->getLocale($this->config->getDefaultLocaleName());

        $productConcreteTransfer = $this->productFacade->getProductConcrete($jellyfishOrderItemTransfer->getSku());

        $categoryCollectionTransfer = $this->productCategoryFacade->getCategoryTransferCollectionByIdProductAbstract(
            $productConcreteTransfer->getFkProductAbstract(),
            $localeTransfer
        );

        return $this->mapCategoryCollectionToString($categoryCollectionTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CategoryCollectionTransfer $categoryCollectionTransfer
     *
     * @return string|null
     */
    protected function mapCategoryCollectionToString(CategoryCollectionTransfer $categoryCollectionTransfer): ?string
    {
        $categories = $categoryCollectionTransfer->getCategories();
        $categoryString = '';

        if ($categories->count() === 0) {
            return null;
        }

        foreach ($categories as $key => $category) {
            if ($key === 0) {
                $categoryString .= $category->getName();
                continue;
            }
            $categoryString .= $category->getName() . ', ';
        }

        return $categoryString;
    }
}
