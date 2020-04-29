<?php


namespace Mastering\CalculatorUnitTest\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template;

class BannerCalculator extends Template implements BlockInterface
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('widget/simple.phtml');
    }
}
