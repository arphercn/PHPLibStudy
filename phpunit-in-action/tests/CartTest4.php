<?php
/* tests/CartTest4.php */
// Data Providers (數據提供者)

require __DIR__ . '/../Cart.php';

class CartTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     */
    public function testUpdateQuantitiesAndGetTotal($quantities, $expected)
    {
        $cart = new Cart();
        $cart->updateQuantities($quantities);
        $this->assertEquals($expected, $cart->getTotal());
    }

    public function provider()
    {
        return [
            [ [ 1, 0, 0, 0, 0, 0 ], 199 ],
            [ [ 1, 0, 0, 2, 0, 0 ], 797 ],
        ];
    }

    public function testGetProducts()
    {
        $cart = new Cart();
        $products = $cart->getProducts();
        $this->assertEquals(6, count($products));
        $this->assertEquals(0, $products[3]['quantity']);
    }
}