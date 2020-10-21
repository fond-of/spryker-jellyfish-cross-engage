<?php

namespace FondOfSpryker\Zed\JellyfishCrossEngage\Dependency\Plugin;

use Codeception\PHPUnit\TestCase;
use FondOfSpryker\Zed\JellyfishExtension\Dependency\Plugin\JellyfishOrderExpanderPostMapPluginInterface;
use Generated\Shared\Transfer\JellyfishOrderTransfer;
use Orm\Zed\Sales\Persistence\SpySalesOrder;

/**
 * Auto-generated group annotations
 *
 * @group FondOfSpryker
 * @group Zed
 * @group JellyfishCrossEngage
 * @group Dependency
 * @group Plugin
 * @group JellyfishCrossEngageOrderExpanderPluginTest
 * Add your own group annotations below this line
 */
class JellyfishCrossEngageOrderExpanderPluginTest extends TestCase
{
    protected const GET_IP = 'getIp';
    protected const GET_OPT_IN_URL = 'getOptInUrl';
    protected const GET_OPT_OUT_URL = 'getOptOutUrl';
    protected const GET_USER_HASH = 'getUserHash';
    protected const GET_SIGNUP_NEWSLETTER = 'getSignupNewsletter';
    protected const GET_GENDER = 'getGender';
    protected const GET_SALUTATION = 'getSalutation';

    protected const SET_IP = 'setIp';
    protected const SET_OPT_IN_URL = 'setOptInUrl';
    protected const SET_OPT_OUT_URL = 'setOptOutUrl';
    protected const SET_USER_HASH = 'setUserHash';
    protected const SET_SIGNUP_NEWSLETTER = 'setSignupNewsletter';
    protected const SET_GENDER = 'setGender';
    protected const SET_SALUTATION = 'setSalutation';

    /**
     * @return void
     */
    public function testExpand()
    {
        $plugin = $this->createPlugin();
        $salesOrder = $this->createSalesOrderMock([
            static::GET_IP, static::GET_OPT_IN_URL, static::GET_OPT_OUT_URL, static::GET_USER_HASH,
            static::GET_SIGNUP_NEWSLETTER, static::GET_GENDER, static::GET_SALUTATION,
        ]);
        $salesOrder->expects($this->exactly(1))->method(static::GET_IP)->willReturn(static::GET_IP);
        $salesOrder->expects($this->exactly(1))->method(static::GET_OPT_IN_URL)->willReturn(static::GET_OPT_IN_URL);
        $salesOrder->expects($this->exactly(1))->method(static::GET_OPT_OUT_URL)->willReturn(static::GET_OPT_OUT_URL);
        $salesOrder->expects($this->exactly(1))->method(static::GET_USER_HASH)->willReturn(static::GET_USER_HASH);
        $salesOrder->expects($this->exactly(1))->method(static::GET_SIGNUP_NEWSLETTER)->willReturn(static::GET_SIGNUP_NEWSLETTER);
        $salesOrder->expects($this->exactly(1))->method(static::GET_GENDER)->willReturn(static::GET_GENDER);
        $salesOrder->expects($this->exactly(1))->method(static::GET_GENDER)->willReturn(static::GET_GENDER);

        $jellyTransfer = $this->createJellyfishOrderTransferMock([
            static::SET_IP, static::SET_OPT_IN_URL, static::SET_OPT_OUT_URL, static::SET_USER_HASH,
            static::SET_SIGNUP_NEWSLETTER, static::SET_GENDER, static::SET_SALUTATION,
        ]);

        $jellyTransfer->expects($this->exactly(1))->method(static::SET_IP)->willReturn($jellyTransfer);
        $jellyTransfer->expects($this->exactly(1))->method(static::SET_OPT_IN_URL)->willReturn($jellyTransfer);
        $jellyTransfer->expects($this->exactly(1))->method(static::SET_OPT_OUT_URL)->willReturn($jellyTransfer);
        $jellyTransfer->expects($this->exactly(1))->method(static::SET_USER_HASH)->willReturn($jellyTransfer);
        $jellyTransfer->expects($this->exactly(1))->method(static::SET_SIGNUP_NEWSLETTER)->willReturn($jellyTransfer);
        $jellyTransfer->expects($this->exactly(1))->method(static::SET_GENDER)->willReturn($jellyTransfer);
        $jellyTransfer->expects($this->exactly(1))->method(static::SET_GENDER)->willReturn($jellyTransfer);

        $plugin->expand($jellyTransfer, $salesOrder);
    }

    /**
     * @param array $methods
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrder|\PHPUnit\Framework\MockObject\MockObject
     */
    protected function createSalesOrderMock(array $methods): SpySalesOrder
    {
        return $this->getMockBuilder(SpySalesOrder::class)->onlyMethods($methods)->getMock();
    }

    /**
     * @param array $methods
     *
     * @return \Generated\Shared\Transfer\JellyfishOrderTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected function createJellyfishOrderTransferMock(array $methods): JellyfishOrderTransfer
    {
        return $this->getMockBuilder(JellyfishOrderTransfer::class)->onlyMethods($methods)->getMock();
    }

    /**
     * @return \FondOfSpryker\Zed\JellyfishExtension\Dependency\Plugin\JellyfishOrderExpanderPostMapPluginInterface
     */
    protected function createPlugin(): JellyfishOrderExpanderPostMapPluginInterface
    {
        return new JellyfishCrossEngageOrderExpanderPlugin();
    }
}
