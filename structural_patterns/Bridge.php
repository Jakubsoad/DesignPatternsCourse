<?php

interface AppComponent
{
    public function __construct(Platform $platform);

    public function getName(): string;
}

class VideoPlayer implements AppComponent
{
    private Platform $platform;

    public function __construct(Platform $platform)
    {
        $this->platform = $platform;
    }

    public function getPlatform(): Platform
    {
        return $this->platform;
    }

    public function getName(): string
    {
        return 'Video Player for '.$this->platform->getPlatform();
    }
}

class Card implements AppComponent
{
    private Platform $platform;

    public function __construct(Platform $platform)
    {
        $this->platform = $platform;
    }

    public function getPlatform(): Platform
    {
        return $this->platform;
    }

    public function getName(): string
    {
        return 'Card Player for '.$this->platform->getPlatform();
    }
}

interface Platform
{
    public function getPlatform(): string;
}

class IOS implements Platform
{
    public function getPlatform(): string
    {
        return 'iOS';
    }
}

class Android implements Platform
{
    public function getPlatform(): string
    {
        return 'Android';
    }
}

$android = new Android();
$videoPlayer = new VideoPlayer($android);
print $videoPlayer->getName()."\r\n";

$ios = new IOS();
$card = new Card($ios);
print $card->getName();
