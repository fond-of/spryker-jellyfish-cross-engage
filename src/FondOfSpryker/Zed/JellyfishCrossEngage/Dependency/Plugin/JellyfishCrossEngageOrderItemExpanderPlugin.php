<?php

namespace FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Plugin;

use FondOfSpryker\Zed\JellyfishExtension\Dependency\Plugin\JellyfishOrderItemExpanderPostMapPluginInterface;
use Generated\Shared\Transfer\JellyfishOrderItemTransfer;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\JellyfishCrossEngage\Business\JellyfishCrossEngageFacadeInterface getFacade()
 */
class JellyfishCrossEngageOrderItemExpanderPlugin extends AbstractPlugin implements JellyfishOrderItemExpanderPostMapPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\JellyfishOrderItemTransfer $jellyfishOrderItemTransfer
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem $salesOrderItem
     *
     * @return \Generated\Shared\Transfer\JellyfishOrderItemTransfer
     */
    public function expand(
        JellyfishOrderItemTransfer $jellyfishOrderItemTransfer,
        SpySalesOrderItem $salesOrderItem
    ): JellyfishOrderItemTransfer {
        $jellyfishOrderItemTransfer->setGender($this->getFacade()->getGender($jellyfishOrderItemTransfer))
            ->setCategories($this->getFacade()->getCategories($jellyfishOrderItemTransfer));

        return $jellyfishOrderItemTransfer;
    }
}
