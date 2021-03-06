<?php

namespace FondOfSpryker\Zed\JellyfishCrossEngage\Business;

use Generated\Shared\Transfer\JellyfishOrderItemTransfer;

interface JellyfishCrossEngageFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\JellyfishOrderItemTransfer $jellyfishOrderItemTransfer
     *
     * @return string|null
     */
    public function getGender(JellyfishOrderItemTransfer $jellyfishOrderItemTransfer): ?string;

    /**
     * @param \Generated\Shared\Transfer\JellyfishOrderItemTransfer $jellyfishOrderItemTransfer
     *
     * @return string
     */
    public function getCategories(JellyfishOrderItemTransfer $jellyfishOrderItemTransfer): ?string;
}
