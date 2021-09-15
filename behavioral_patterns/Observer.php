<?php

interface Observable
{
    public function addObserver(Subscriber $subscriber): void;
    public function notifyObserver(Message $message): void;
}

interface Observer
{
    public function __construct(string $name);
}

class Message
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}

class NotificationService implements Observable
{
    /** @var null[]|Subscriber[] */
    private array $subscribers = [];

    public function addObserver(Subscriber $subscriber): void
    {
        $this->subscribers[] = $subscriber;
    }

    public function notifyObserver(Message $message): void
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->onMessagePosted($message);
        }
    }
}

class Subscriber implements Observer
{
    private string $name;
    private array $receivedNotification = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function onMessagePosted(Message $message): void
    {
        $this->receivedNotification[] = $message;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getReceivedNotification(): array
    {
        return $this->receivedNotification;
    }

    public function getStringifiedNotifications(): string
    {
        return implode(
            ', ',
            array_map(fn(Message $message): string => $message->getContent(), $this->getReceivedNotification())
        );
    }
}

$subscriberX = new Subscriber('Joe');
$subscriberY = new Subscriber('Paul');

$notificationService  = new NotificationService();
$notificationService->addObserver($subscriberX);
$notificationService->addObserver($subscriberY);

$message1 = new Message('New test message');
$message2 = new Message('Another message');
$message3 = new Message('And another one');

$notificationService->notifyObserver($message1);
$notificationService->notifyObserver($message2);
$notificationService->notifyObserver($message3);

$messagesForX = $subscriberX->getStringifiedNotifications();
$messagesForY = $subscriberY->getStringifiedNotifications();

echo 'User: '.$subscriberX->getName(), ', Messages text: '. $messagesForX;
echo PHP_EOL;
echo 'User: '.$subscriberY->getName(), ', Messages text: '. $messagesForY;
