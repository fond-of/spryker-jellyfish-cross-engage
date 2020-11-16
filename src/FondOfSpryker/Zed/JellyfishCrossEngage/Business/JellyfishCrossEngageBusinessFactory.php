<?php

namespace FondOfSpryker\Zed\JellyfishCrossEngage\Business;

use FondOfSpryker\Zed\JellyfishCrossEngage\Business\JellyfishCrossEngage\JellyfishCrossEngageReader;
use FondOfSpryker\Zed\JellyfishCrossEngage\Business\JellyfishCrossEngage\JellyfishCrossEngageReaderInterface;
use FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToLocaleFacadeInterface;
use FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToProductCategoryFacadeInterface;
use FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToProductFacadeInterface;
use FondOfSpryker\Zed\JellyfishCrossEngage\JellyfishCrossEngageDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\JellyfishCrossEngage\JellyfishCrossEngageConfig getConfig()
 */
class JellyfishCrossEngageBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\JellyfishCrossEngage\Business\JellyfishCrossEngage\JellyfishCrossEngageReaderInterface
     */
    public function createJellyfishCrossEngageReader(): JellyfishCrossEngageReaderInterface
    {
        return new JellyfishCrossEngageReader(
            $this->getProductFacade(),
            $this->getProductCategoryFacade(),
            $this->getConfig(),
            $this->getLocaleFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToProductFacadeInterface
     */
    protected function getProductFacade(): JellyfishCrossEngageToProductFacadeInterface
    {
        return $this->getProvidedDependency(JellyfishCrossEngageDependencyProvider::PRODUCT_FACADE);
    }

    /**
     * @return \FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToProductCategoryFacadeInterface
     */
    protected function getProductCategoryFacade(): JellyfishCrossEngageToProductCategoryFacadeInterface
    {
        return $this->getProvidedDependency(JellyfishCrossEngageDependencyProvider::PRODUCT_CATEGORY_FACADE);
    }

    /**
     * @return \FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Client\JellyfishCrossEngageToLocaleFacadeInterface
     */
    protected function getLocaleFacade(): JellyfishCrossEngageToLocaleFacadeInterface
    {
        return $this->getProvidedDependency(JellyfishCrossEngageDependencyProvider::LOCALE_FACADE);
    }
}
