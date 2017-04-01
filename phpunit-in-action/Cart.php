<?php

class Cart
{
    private $products = [
        [
            'name'     => 'iPhone 6 (16G)',
            'quantity' => 0,
            'price'    => 199,
            'subtotal' => 0,
        ],
        [
            'name'     => 'iPhone 6 (64G)',
            'quantity' => 0,
            'price'    => 299,
            'subtotal' => 0,
        ],
        [
            'name'     => 'iPhone 6 (128G)',
            'quantity' => 0,
            'price'    => 399,
            'subtotal' => 0,
        ],
        [
            'name'     => 'iPhone 6 Plus (16G)',
            'quantity' => 0,
            'price'    => 299,
            'subtotal' => 0,
        ],
        [
            'name'     => 'iPhone 6 Plus (64G)',
            'quantity' => 0,
            'price'    => 399,
            'subtotal' => 0,
        ],
        [
            'name'     => 'iPhone 6 Plus (128G)',
            'quantity' => 0,
            'price'    => 499,
            'subtotal' => 0,
        ],
    ];

    private $total = 0;

    public function getProducts()
    {
        return $this->products;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function updateQuantities($quantities)
    {
        foreach ($quantities as $key => $qty) {
            if (!is_numeric($qty) || (int) $qty < 0) {
                throw new CartException("数量不正确,请输入 0 或 0 以上的整数", 1);
            }

            $this->products[$key]['quantity'] = $qty;
            $this->products[$key]['subtotal'] =
                $this->products[$key]['quantity'] *
                $this->products[$key]['price'];
        }

        $this->total = 0;
        foreach ($this->products as $key => $product) {
            $this->total += $product['subtotal'];
        }
    }

    public function __sleep()
    {
        return ['products', 'total'];
    }
}


class CartException extends Exception
{
}