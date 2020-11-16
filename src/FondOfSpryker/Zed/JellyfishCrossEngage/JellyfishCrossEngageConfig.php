<?php

namespace FondOfSpryker\Zed\JellyfishCrossEngage;

use FondOfSpryker\Shared\JellyfishCrossEngage\JellyfishCrossEngageConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class JellyfishCrossEngageConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getDefaultLocaleName(): string
    {
        return $this->get(JellyfishCrossEngageConstants::DEFAULT_LOCALE_NAME, 'en_US');
    }
}
