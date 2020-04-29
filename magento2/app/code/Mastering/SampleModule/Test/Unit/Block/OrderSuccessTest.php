<?php

namespace Mastering\SampleModule\Test\Unit\Block;


use Mastering\SampleModule\Block\OrderSuccess;
use Mastering\SampleModule\Model\LuckInfo;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Checkout\Model\Session;

use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

class OrderSuccessTest extends TestCase
{
    /**
     * @var OrderSuccess
     */
    private $block;

    /**
     * @var LuckInfo|PHPUnit_Framework_MockObject_MockObject
     */
    private $luckInfo;

    /**
     * @var Session|PHPUnit_Framework_MockObject_MockObject
     */
    private $session;

    protected function setUp()
    {
        $objectManager = new ObjectManager($this);

        $this->luckInfo =  $this->getMockBuilder(LuckInfo::class)->getMock();

        $this->session =$this->getMockBuilder(Session::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->block = $objectManager->getObject(
            'Mastering\SampleModule\Block\OrderSuccess',
            [
                'luckInfo' => $this->luckInfo,
                'session' => $this->session
            ]
        );
    }

    /**
     * @param $isLucky
     * @param $html
     * @dataProvider luckyProvider
     */
    public function testToHtml($isLucky, $html)
    {
        $amount = 1.24;


        $order = $this->getMockBuilder('Magento\Sales\Model\Order')
            ->disableOriginalConstructor()
            ->getMock();

        $order->expects($this->once())
            ->method('getGrandTotal')
            ->willReturn($amount);

        $this->session->expects($this->once())
            ->method('getLastRealOrder')
            ->willReturn($order);

        $this->luckInfo->expects($this->once())
            ->method('isAmountLucky')
//            ->with($amount)
            ->willReturn($isLucky);

        $this->assertEquals($html, $this->block->toHtml());
    }

    public function luckyProvider()
    {
        return [
            [true, __('Your order is lucky!')],
            [false, '']
        ];
    }
}
