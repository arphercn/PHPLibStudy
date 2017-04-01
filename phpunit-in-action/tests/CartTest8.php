<?php
/* Fixtures (基礎設施) */

require __DIR__ . '/../Cart.php';

class CartTest extends PHPUnit_Framework_TestCase
{
    private $cart = null;

    public function setUp()
    {
        $this->cart = new Cart();
    }

    public function tearDown()
    {
        $this->cart = null;
    }

    public function provider()
    {
        return [
            [ [ 1, 0, 0, 0, 0, 0 ], 199 ],
            [ [ 1, 0, 0, 2, 0, 0 ], 797 ],
        ];
    }

    /**
     * @dataProvider provider
     * @group update
     */
    public function testUpdateQuantitiesAndGetTotal($quantities, $expected)
    {
        $this->cart->updateQuantities($quantities);
        $this->assertEquals($expected, $this->cart->getTotal());
    }

    // ...

    /**
     * @group update
     * @group exception
     */
    public function testUpdateQuantitiesWithException()
    {
        $this->setExpectedException('CartException');
        $quantities = [ -1, 0, 0, 0, 0, 0 ];
        $this->cart->updateQuantities($quantities); // 預期會產生一個 Exception
    }

    /**
     * @group get
     */
    public function testGetProducts()
    {
        $products = $this->cart->getProducts();
        $this->assertEquals(6, count($products));
        $this->assertEquals(0, $products[3]['quantity']);
    }
}