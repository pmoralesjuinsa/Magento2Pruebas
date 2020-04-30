<?php


namespace Mastering\CalculatorUnitTest\Block\Widget;

use Magento\Backend\Block\Template\Context;
use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template;
//use Magento\Framework\App\ObjectManager;
use Mastering\CalculatorUnitTest\Model\Calculator;

class BannerCalculator extends Template implements BlockInterface
{
    protected $calculator;

    public function __construct(Context $context, Calculator $calculator, array $data = [])
    {
        parent::__construct($context, $data);
//        $objectManager = ObjectManager::getInstance();
//        $calculator = $objectManager->create(Calculator::class);
        $this->calculator = $calculator;
        $this->setTemplate('widget/bannercalculator.phtml');
    }

    public function calculate($operator, $numeroUno, $numeroDos)
    {
        return $this->calculator->$operator($numeroUno, $numeroDos);
    }
}
