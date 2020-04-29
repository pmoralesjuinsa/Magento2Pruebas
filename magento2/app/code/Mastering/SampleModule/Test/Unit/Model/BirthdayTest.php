<?php


namespace Mastering\SampleModule\Test\Unit\Model;

use Mastering\SampleModule\Model\Birthday;
use PHPUnit\Framework\TestCase;

class BirthdayTest extends TestCase
{
    private $birthday;

    protected function setUp(){
        $this->birthday = new Birthday();
    }

    /**
     * @param $isYourBirthday
     * @param $date
     * @dataProvider dateProvider
     */
    public function testIsAmountLucky($isYourBirthday, $date){
        $this->assertEquals($isYourBirthday,$this->birthday->isYourBirthday($date));
    }

    public function dateProvider(){
        $today = date('d-m-Y');
        return [
            'lucky' => [true,$today],
            'not lucky' => [false,"21-04-2020"]

        ];
    }
}
