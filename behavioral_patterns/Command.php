<?php

class Engine
{
    public function turnOn(): string
    {
        return 'Engine is on';
    }

    public function turnOff(): string
    {
        return 'Engine is off';
    }
}

interface Command
{
    public function execute(): string;
}

class TurnOnEngineCommand implements Command
{
    private Engine $engine;

    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function execute(): string
    {
        return $this->engine->turnOn();
    }
}

class TurnOffEngineCommand implements Command
{
    private Engine $engine;

    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function execute(): string
    {
        return $this->engine->turnOff();
    }
}

class EngineSwitcher
{
    public function useSwitch(Command $command): string
    {
        return $command->execute();
    }
}

$engine = new Engine();
$turnOnCommand = new TurnOnEngineCommand($engine);
$turnOffCommand = new TurnOffEngineCommand($engine);
$switcher = new EngineSwitcher();

echo $switcher->useSwitch($turnOnCommand);
echo $switcher->useSwitch($turnOffCommand);
