<?php
class Cart
{
    // 商品分標籤存放
    private $products = [
        'R' => [],
        'G' => [],
    ];

    // 總計
    private $total = 0;

    public function addProduct(Product $product)
    {
        // 加入商品時先看標籤
        $this->products[$product->getTag()][] = $product;
    }

    public function checkout()
    {
        // 比對紅標商品數是否等於綠標商品數
        $redCount = count($this->products['R']);
        $greenCount = count($this->products['G']);

        if ($redCount !== $greenCount) {
            throw new CartException('商品配對錯誤');
        }

        // 計算紅標商品金額小計
        foreach ($this->products['R'] as $product) {
            $this->total += $product->getPrice();
        }

        // 計算綠標商品金額小計
        foreach ($this->products['G'] as $product) {
            $this->total += $product->getPrice();
        }

        // 打七五折
        $this->total *= 0.75;
    }

    public function getTotal()
    {
        // 回傳總計
        return $this->total;
    }
}

class CartException extends Exception
{
}
