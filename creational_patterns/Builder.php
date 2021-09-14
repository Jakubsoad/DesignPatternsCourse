<?php

class Pizza {
    protected string $size;

    protected ?bool $tomato = false;
    protected ?bool $extraCheese = false;
    protected ?bool $bacon = false;

    public function __construct(PizzaBuilder $pizzaBuilder)
    {
        $this->size = $pizzaBuilder->size;
        $this->tomato = $pizzaBuilder->tomato;
        $this->extraCheese = $pizzaBuilder->extraCheese;
        $this->bacon = $pizzaBuilder->bacon;
    }
}

class PizzaBuilder
{
    public string $size;
    public ?bool $tomato = false;
    public ?bool $extraCheese = false;
    public ?bool $bacon = false;

    public function __construct(string $size)
    {
        $this->size = $size;
    }

    public function addTomato(): PizzaBuilder
    {
        $this->tomato = true;
        return $this;
    }

    public function addExtraCheese(): PizzaBuilder
    {
        $this->extraCheese = true;
        return $this;
    }

    public function build(): Pizza
    {
        return new Pizza($this);
    }
}

$pizza = (new PizzaBuilder('Small'))
    ->addTomato()
    ->addExtraCheese()
    ->build();

echo '<pre>';
echo_r($pizza);
echo '</pre>';
