<?php

namespace FondOfSpryker\Zed\JellyfishCrossEngage;

use Codeception\Test\Unit;

class JellyfishCrossEngageConfigTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\JellyfishCrossEngage\JellyfishCrossEngageConfig
     */
    protected $jellyfishCrossEngageConfig;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->jellyfishCrossEngageConfig = new JellyfishCrossEngageConfig();
    }

    /**
     * @return void
     */
    public function testGetDefaultLocaleName(): void
    {
        $this->assertSame(
            'en_US',
            $this->jellyfishCrossEngageConfig->getDefaultLocaleName()
        );
    }
}
