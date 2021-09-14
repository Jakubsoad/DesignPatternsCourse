<?php

abstract class PaymentProcessor
{
    protected ?PaymentProcessor $successor = null;

    public function setSuccessor(PaymentProcessor $paymentProcessor): void
    {
        $this->successor = $paymentProcessor;
    }

    abstract public function processPayment(float $amount): null|string;
}

class PayPal extends PaymentProcessor
{
    public function processPayment(float $amount): null|string
    {
        if ($amount >= 0 && $amount <= 99) {
            return "PayPal payment $amount";
        } else {
            if ($this->successor !== null) {
                return $this->successor->processPayment($amount);
            }
        }

        return null;
    }
}

class BankTransfer extends PaymentProcessor
{
    public function processPayment(float $amount): null|string
    {
        if ($amount >= 100 && $amount <= 999) {
            return "Bank Transfer payment $amount";
        } else {
            if ($this->successor !== null) {
                return $this->successor->processPayment($amount);
            }
        }

        return null;
    }
}

class CreditCard extends PaymentProcessor
{
    public function processPayment(float $amount): null|string
    {
        if ($amount >= 1000) {
            return "Credit Card payment payment $amount";
        } else {
            if ($this->successor !== null) {
                return $this->successor->processPayment($amount);
            }
        }

        return null;
    }
}

$paypal = new PayPal();
$bankTransfer = new BankTransfer();
$creditCard = new CreditCard();

$paypal->setSuccessor($bankTransfer);
$bankTransfer->setSuccessor($creditCard);

print $paypal->processPayment(80);
