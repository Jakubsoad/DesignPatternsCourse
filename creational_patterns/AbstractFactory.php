<?php

abstract class UIFactory
{
    abstract function createButton(): Button;
    abstract function createMenu(): Menu;
}

class WindowsUIFactory extends UIFactory
{
    public function createButton(): Button
    {
        return new WindowsButton();
    }

    public function createMenu(): Menu
    {
        return new WindowsMenu();
    }
}

class LinuxUIFactory extends UIFactory
{
    public function createButton(): Button
    {
        return new LinuxButton();
    }

    public function createMenu(): Menu
    {
        return new LinuxMenu();
    }
}

abstract class Button
{
    abstract function getName(): string;
}

class WindowsButton extends Button
{
    public function getName(): string
    {
        return 'Windows buttons';
    }
}

class LinuxButton extends Button
{
    public function getName(): string
    {
        return 'Linux buttons';
    }
}

abstract class Menu
{
    abstract function getName(): string;
}

class WindowsMenu extends Menu
{
    public function getName(): string
    {
        return 'Windows menu';
    }
}

class LinuxMenu extends Menu
{
    public function getName(): string
    {
        return 'Linux menu';
    }
}

$os = 'Windows';
$uiFactory = null;

if ($os === 'Windows') {
    $uiFactory = new WindowsUIFactory();
} else {
    $uiFactory = new LinuxUIFactory();
}

$button = $uiFactory->createButton();
$menu = $uiFactory->createMenu();

var_dump($button->getName());
