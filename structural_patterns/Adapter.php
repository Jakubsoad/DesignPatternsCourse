<?php

class Product
{
    private string $sku;
    private float $price;

    public function __construct(string $sku, float $price)
    {
        $this->sku = $sku;
        $this->price = $price;
    }


    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }
}

class ProductAdapter
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function displaySku(): string
    {
        return $this->product->getSku();
    }

    public function displayPrice(): float
    {
        return $this->product->getPrice();
    }
}

$product = new Product('123781273987129837198273', 120);
$productAdapter = new ProductAdapter($product);
print $productAdapter->displaySku();
print "\n";
print $productAdapter->displayPrice();
