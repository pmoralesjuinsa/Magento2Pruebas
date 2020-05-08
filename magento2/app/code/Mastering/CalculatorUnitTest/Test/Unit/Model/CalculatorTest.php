<?php


namespace Mastering\CalculatorUnitTest\Test\Unit\Model;


use Mastering\CalculatorUnitTest\Model\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private $calculator;

    protected function setUp(){
        $this->calculator = new Calculator();
    }

    /**
     * @param $result
     * @param $numeroUno
     * @param $numeroDos
     * @dataProvider sumProvider
     */
    public function testSuma($result, $numeroUno, $numeroDos){
        $this->assertEquals($result, $this->calculator->suma($numeroUno, $numeroDos));
    }

    public function sumProvider(){
        return [
            [2,1,1],
            [110,50,60]
        ];
    }

    public function testSumaError(){
        $this->assertNotEquals(2, $this->calculator->resta(50, 10));
    }

    public function testResta(){
        $this->assertEquals(-1, $this->calculator->resta(0, 1));
    }

    public function testRestaError(){
        $this->assertNotEquals(20, $this->calculator->resta(60, 5001));
    }

    public function testMultiplicacion(){
        $this->assertEquals(15, $this->calculator->multiplicacion(5, 3));
    }

    public function testMultiplicacionError(){
        $this->assertNotEquals(15, $this->calculator->multiplicacion(54, 32));
    }

    public function testDivision(){
        $this->assertEquals(5, $this->calculator->division(25, 5));
    }

    public function testDivisionError(){
        $this->assertNotEquals(54, $this->calculator->division(25, 5));
    }

}
