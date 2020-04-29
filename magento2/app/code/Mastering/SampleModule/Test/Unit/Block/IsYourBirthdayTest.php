<?php

namespace Mastering\SampleModule\Test\Unit\Block;


use Mastering\SampleModule\Block\IsYourBirthday;
use Mastering\SampleModule\Model\Birthday;

use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Checkout\Model\Session;

use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

class IsYourBirthdayTest extends TestCase
{
    /**
     * @var IsYourBirthday
     */
    private $block;

    /**
     * @var Birthday|PHPUnit_Framework_MockObject_MockObject
     */
    private $birthday;

    /**
     * @var \DateTime
     */
    private $myDate;

    protected function setUp()
    {
        $objectManager = new ObjectManager($this);

        $this->birthday =  $this->getMockBuilder(Birthday::class)->getMock();

        $this->myDate = date('d-m-Y');

        $this->block = $objectManager->getObject(
            'Mastering\SampleModule\Block\IsYourBirthday',
            [
                'birthday' => $this->birthday,
                'mydate' => $this->myDate
            ]
        );
    }

    /**
     * @param $isYourBirthday
     * @param $html
     * @dataProvider dateProvider
     */
    public function testToHtml($isYourBirthday, $html)
    {
        $this->birthday->expects($this->once())
            ->method('isYourBirthday')
            ->willReturn($isYourBirthday);

        $this->assertEquals($html, $this->block->toHtml());
    }

    public function dateProvider()
    {
        return [
            [true, __('happy birthday to you')],
            [false, '']
        ];
    }
}
