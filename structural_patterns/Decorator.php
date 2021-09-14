<?php

interface Window
{
    public function renderWindow(): string;
}

class BasicWindow implements Window
{
    public function renderWindow(): string
    {
        return 'New window';
    }
}

interface WindowDecorator
{
    public function __construct(Window $window);
}

class ScrollbarDecorator implements WindowDecorator, Window
{
    private Window $window;

    public function __construct(Window $window)
    {
        $this->window = $window;
    }

    public function renderWindow(): string
    {
        return $this->window->renderWindow().$this->renderScrollbar();
    }

    public function renderScrollbar(): string
    {
        return ' with scrollbar';
    }
}

class HeaderDecorator implements WindowDecorator
{
    private Window $window;

    public function __construct(Window $window)
    {
        $this->window = $window;
    }

    public function renderWindow(): string
    {
        return $this->window->renderWindow().$this->renderHeader();
    }

    public function renderHeader(): string
    {
        return ' with header';
    }
}

$window = new BasicWindow();
$window = new ScrollbarDecorator($window);
$window = new HeaderDecorator($window);
echo $window->renderWindow();

