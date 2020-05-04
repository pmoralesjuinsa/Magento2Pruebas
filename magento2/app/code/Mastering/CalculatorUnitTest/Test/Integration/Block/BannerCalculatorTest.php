<?php


namespace Mastering\CalculatorUnitTest\Test\Integration\Block;


use PHPUnit\Framework\TestCase;
use Magento\TestFramework\Helper\Bootstrap;
use Mastering\CalculatorUnitTest\Block\Widget\BannerCalculator;

/**
 * @magentoAppArea frontend
 */
class BannerCalculatorTest extends TestCase
{

    /**
     * @var BannerCalculator
     */
    private $bannerCalculator;

    protected function setUp()
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->bannerCalculator = $objectManager->get(BannerCalculator::class);
    }

    public function testToHtml()
    {

        $title = 'buy in mangora';
        $message = 'It is the best online store';
        $numberOne = "5";
        $numberTwo = "3";

        $template = 'Mastering_CalculatorUnitTest::widget/bannercalculator.phtml';
        $this->bannerCalculator->setTemplate($template);
        $this->bannerCalculator->setData('title', $title);
        $this->bannerCalculator->setData('message',$message);
        $this->bannerCalculator->setData('numberOne', $numberOne);
        $this->bannerCalculator->setData('numberTwo', $numberTwo);
        $this->bannerCalculator->setData('operatorType', 'multiplicacion');

        $html = $this->bannerCalculator->toHtml();

        $expectedTitle = $title;
        $this->assertContains($expectedTitle, $html);

        $expectedSubtitle = $message;
        $this->assertContains($expectedSubtitle, $html);

        $expectedNumberOne = $numberOne;
        $this->assertContains($expectedNumberOne, $html);

        $expectedNumberTwo = $numberTwo;
        $this->assertContains($expectedNumberTwo, $html);

        $expectedNumberMultiplication = "15";
        $this->assertContains($expectedNumberMultiplication, $html);

        $parentDivCssClass = 'torero';
        $this->assertContains($parentDivCssClass, $html);
    }
}
