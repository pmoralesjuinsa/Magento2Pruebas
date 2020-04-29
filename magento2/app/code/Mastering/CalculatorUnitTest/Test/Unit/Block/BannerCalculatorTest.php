<?php


namespace Mastering\CalculatorUnitTest\Test\Unit\Block;

use PHPUnit\Framework\TestCase;
use Mastering\CalculatorUnitTest\Block\Widget\BannerCalculator;
use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;

class BannerCalculatorTest extends TestCase
{
    /**
     * @var BannerCalculator
     */
    private $object;

    protected function setUp()
    {
        $contextMock = $this->getMockBuilder(Context::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->object = new BannerCalculator($contextMock);
    }

    public function testBannerInstance()
    {
        $this->assertInstanceOf(BannerCalculator::class, $this->object);
    }

    public function testImplementsBlockInterface()
    {
        $this->assertInstanceOf(BlockInterface::class, $this->object);
    }
}
