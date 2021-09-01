<?php

interface Vehicle
{
    public function getName(): string;
}

class Car implements Vehicle
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Bicycle implements Vehicle
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

interface VehicleFactory
{
    public function create(string $name): Vehicle;
}

class CarFactory implements VehicleFactory
{
    public function create(string $name): Vehicle
    {
        return new Car($name);
    }
}

class BicycleFactory implements VehicleFactory
{
    public function create(string $name): Vehicle
    {
        return new Bicycle($name);
    }
}

var_dump((new BicycleFactory)->create('Romet'));
