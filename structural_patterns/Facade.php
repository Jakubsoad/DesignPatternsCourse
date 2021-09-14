<?php

class Product
{
    public function getProduct(): string
    {
        return 'Product';
    }
}

class Payment
{
    public function makePayment(): bool
    {
        return true;
    }
}

class Customer
{
    public function getCustomerData(): string
    {
        return 'Customer Data';
    }
}

class OrderFacade
{
    private Product $product;
    private Payment $payment;
    private Customer $customer;

    public function __construct()
    {
        $this->product = new Product();
        $this->payment = new Payment();
        $this->customer = new Customer();
    }

    public function prepareOrder(): string
    {
        $this->product->getProduct();
        $this->payment->makePayment();
        $this->customer->getCustomerData();

        return 'The order has been completed';
    }
}

$order = new OrderFacade();
echo $order->prepareOrder();
