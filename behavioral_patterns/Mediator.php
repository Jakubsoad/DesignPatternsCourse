<?php

interface ChatMediator
{
    public function sendMessage(User $user, string $message): string;
}

class ChatMediatorClass implements ChatMediator
{
    public function sendMessage(User $user, string $message): string
    {
        $sender = $user->getName();

        return "Sender: $sender, Message: $message";
    }
}

class User
{

    private string $name;
    private ChatMediator $chatMediator;

    public function __construct(string $name, ChatMediator $chatMediator)
    {
        $this->name = $name;
        $this->chatMediator = $chatMediator;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getChatMediator(): ChatMediator
    {
        return $this->chatMediator;
    }

    public function send(string $message): string
    {
        return $this->chatMediator->sendMessage($this, $message);
    }
}

$chatMediator = new ChatMediatorClass();
$user1 = new User('Joe', $chatMediator);
$user2 = new User('Paul', $chatMediator);

print $user1->send('Hello').PHP_EOL;
print $user2->send('Hi :)');
