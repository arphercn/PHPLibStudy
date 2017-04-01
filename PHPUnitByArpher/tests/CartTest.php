<?php
require_once __DIR__ . '/../Cart.php';
require_once __DIR__ . '/../Product.php';

class CartTest extends PHPUnit_Framework_TestCase
{
    private $cart = null;

    private $products = [];

    public function setUp()
    {
        $this->cart = new Cart();
        $this->products = [
            new Product('紅標商品 1', 200, 'R'),
            new Product('紅標商品 2', 160, 'R'),
            new Product('綠標商品 1',  80, 'G'),
            new Product('綠標商品 2', 100, 'G'),
        ];
    }

    public function tearDown()
    {
        $this->cart = null;
        $this->products = [];
    }

    public function testAddOneRedProudct()
    {
        $this->setExpectedException('CartException', '商品配對錯誤');
        $this->cart->addProduct($this->products[0]); // 紅標商品 1
        $this->cart->checkout();
    }

    public function testAddOneRedProudctAndOneGreenProduct()
    {
        $this->cart->addProduct($this->products[0]); // 紅標商品 1
        $this->cart->addProduct($this->products[2]); // 綠標商品 1
        $this->cart->checkout();
        $this->assertEquals(210, $this->cart->getTotal());
    }

}