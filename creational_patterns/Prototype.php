<?php

class Pizza
{
    protected int $size;
    protected float $price;

    public function __construct(int $size, float $price)
    {
        $this->size = $size;
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }
}

$pizza = new Pizza(30, 16.99);
$pizza2 = clone $pizza;


var_dump($pizza2);