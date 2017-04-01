<?php

require_once __DIR__ . '/../Product.php';

class ProductTest extends PHPUnit_Framework_TestCase
{
    public function testProductConstructorAndGetter()
    {
        $product = new Product('商品1', 245, 'R');
        $this->assertEquals('商品1', $product->getName());
        $this->assertEquals(245, $product->getPrice());
        $this->assertEquals('R', $product->getTag());
    }
}