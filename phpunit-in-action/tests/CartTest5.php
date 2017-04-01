<?php
// 對異常進行測試
// PHP 錯誤測試

require __DIR__ . '/../Cart.php';



class CartTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException CartException
     */
    public function testUpdateQuantitiesWithException()
    {
        $cart = new Cart();
        $quantities = [ -1, 0, 0, 0, 0, 0 ];
        $cart->updateQuantities($quantities); // 預期會產生一個 Exception
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testFileWriting()
    {
        $this->assertFalse(file_put_contents('/is-not-writeable/file', 'stuff'));
    }
}