<?php

namespace FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Plugin;

use FondOfSpryker\Zed\JellyfishExtension\Dependency\Plugin\JellyfishOrderExpanderPostMapPluginInterface;
use Generated\Shared\Transfer\JellyfishOrderTransfer;
use Orm\Zed\Sales\Persistence\SpySalesOrder;

class JellyfishCrossEngageOrderExpanderPlugin implements JellyfishOrderExpanderPostMapPluginInterface
{
    public function expand(
        JellyfishOrderTransfer $jellyfishOrderTransfer,
        SpySalesOrder $salesOrder
    ): JellyfishOrderTransfer {
        $jellyfishOrderTransfer->setIp($salesOrder->getIp())
            ->setOptInUrl($salesOrder->getOptInUrl())
            ->setOptOutUrl($salesOrder->getOptOutUrl())
            ->setUserHash($salesOrder->getUserHash())
            ->setSignupNewsletter($salesOrder->getSignupNewsletter())
            ->setGender($salesOrder->getGender())
            ->setSalutation($salesOrder->getSalutation());

        return $jellyfishOrderTransfer;
    }
}
