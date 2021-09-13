<?php

interface Image
{
    public function render(): string;
}

class RealImage implements Image
{
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->loadImage();
    }

    public function loadImage(): string
    {
        return "Loading image from $this->filename";
    }

    public function render(): string
    {
        return "Content of image $this->filename";
    }
}

class ProxyImage implements Image
{
    private ?Image $image = null;
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function render(): string
    {
        if ($this->image === null) {
            $this->image = new RealImage($this->filename);
        }

        return $this->image->render();
    }
}

$image = new ProxyImage('example.jpg');
$image->render();
