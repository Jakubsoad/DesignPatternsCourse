<?php

interface Shape
{
    public function __construct(string $name, string $color);
}

class BasicShape implements Shape
{
    private string $name;
    private string $color;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }
}

class BasicShapeFactory
{
    private array $instances = [];

    public function getBasicShape(string $name, string $color): BasicShape
    {
        if (!isset($this->instances[$name])) {
            $this->instances[$name] = new BasicShape($name, $color);
        }

        return $this->instances[$name];
    }

    public function countInstances(): int
    {
        return count($this->instances);
    }
}

$factory = new BasicShapeFactory();
$shape = $factory->getBasicShape('Square', 'Green');
$shape = $factory->getBasicShape('Triangle', 'Red');
