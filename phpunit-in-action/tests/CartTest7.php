<?php
// 對異常進行測試
// PHP 錯誤測試

// 测试方法phpunit --group update tests/CartTest7
// 测试方法phpunit --group get tests/CartTest7

require __DIR__ . '/../Cart.php';

class CartTest extends PHPUnit_Framework_TestCase
{
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
        $cart = new Cart();
        $cart->updateQuantities($quantities);
        $this->assertEquals($expected, $cart->getTotal());
    }

    /**
     * @expectedException CartException
     * @group update
     * @group exception
     */
    public function testUpdateQuantitiesWithException()
    {
        $cart = new Cart();
        $quantities = [ -1, 0, 0, 0, 0, 0 ];
        $cart->updateQuantities($quantities); // 預期會產生一個 Exception
    }

    /**
     * @group get
     */
    public function testGetProducts()
    {
        $cart = new Cart();
        $products = $cart->getProducts();
        $this->assertEquals(6, count($products));
        $this->assertEquals(0, $products[3]['quantity']);
    }

}