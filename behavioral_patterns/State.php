<?php

interface BrushState
{
    public function paint(): string;
}

class SmallBrushState implements BrushState
{
    public function paint(): string
    {
        return '---';
    }
}

class MediumBrushState implements BrushState
{
    public function paint(): string
    {
        return '------';
    }
}

class BigBrushState implements BrushState
{
    public function paint(): string
    {
        return '---------';
    }
}

class Canvas
{
    private BrushState $state;

    public function __construct(BrushState $state)
    {
        $this->state = $state;
    }

    public function setState(BrushState $state): void
    {
        $this->state = $state;
    }

    public function paintLine(): string
    {
        return $this->state->paint();
    }
}

$canvas = new Canvas(new SmallBrushState());

echo $canvas->paintLine().PHP_EOL;

$canvas = new Canvas(new MediumBrushState());

echo $canvas->paintLine().PHP_EOL;

$canvas = new Canvas(new BigBrushState());

echo $canvas->paintLine().PHP_EOL;
