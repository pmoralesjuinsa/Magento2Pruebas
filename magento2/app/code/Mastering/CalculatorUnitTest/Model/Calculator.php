<?php


namespace Mastering\CalculatorUnitTest\Model;


class Calculator
{
    function suma($numeroUno, $numeroDos)
    {
        return $numeroUno+$numeroDos;
    }

    function resta($numeroUno, $numeroDos)
    {
        return $numeroUno-$numeroDos;
    }

    function division($numeroUno, $numeroDos)
    {
        return $numeroUno/$numeroDos;
    }

    function multiplicacion($numeroUno, $numeroDos)
    {
        return $numeroUno*$numeroDos;
    }
}
