<?php


namespace Mastering\SampleModule\Test\Unit\Model;

use Mastering\SampleModule\Model\LuckInfo;
use PHPUnit\Framework\TestCase;

class LuckInfoTest extends TestCase
{
    private $luckInfo;

    protected function setUp(){
        $this->luckInfo = new LuckInfo();
    }

//    public function testIsAmountLucky(){
//        $this->assertEquals(true,$this->luckInfo->isAmountLucky(81.18));
//    }

    /**
     * @param $isLucky
     * @param $amount
     * @dataProvider amountProvider
     */
    public function testIsAmountLucky($isLucky, $amount){
        $this->assertEquals($isLucky,$this->luckInfo->isAmountLucky($amount));
    }

    public function amountProvider(){
        return [
            'lucky' => [true,65.56],
            'not lucky' => [false,66.56]

        ];
    }
}
