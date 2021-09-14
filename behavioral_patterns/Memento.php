<?php

class CalculatorMemento
{
    private float $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function getResult(): float
    {
        return $this->result;
    }
}

class Calculator
{
    private float $result;

    public function sum(float $a, float $b): void
    {
        $this->result = $a + $b;
    }

    public function getResult(): float
    {
        return $this->result;
    }

    public function saveResult(): CalculatorMemento
    {
        return new CalculatorMemento($this->result);
    }

    public function restoreResult(CalculatorMemento $memento): float
    {
        return $this->result = $memento->getResult();
    }
}

$calculator = new Calculator();
$calculator->sum(1, 10);
echo $calculator->getResult(), PHP_EOL;

$mementoResult = $calculator->saveResult();

$calculator->sum(100, 11);
echo $calculator->getResult(), PHP_EOL;

$calculator->restoreResult($mementoResult);
echo $calculator->getResult(), PHP_EOL;
