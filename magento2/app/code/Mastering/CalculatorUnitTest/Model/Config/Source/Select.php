<?php


namespace Mastering\CalculatorUnitTest\Model\Config\Source;


use Magento\Framework\Data\OptionSourceInterface;

class Select implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'multiplicacion', 'label' => __('Multiplication')],
            ['value' => 'suma', 'label' => __('Sum')],
            ['value' => 'resta', 'label' => __('Resta')],
            ['value' => 'division', 'label' => __('Division')]
        ];
    }
}
