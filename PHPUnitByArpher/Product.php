<?php

class Product
{
    private $name = '', $price = 0, $tag = '';

    public function __construct($name, $price, $tag)
    {
        $this->name = $name;
        $this->price = $price;
        $this->tag = $tag;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTag()
    {
        return $this->tag;
    }
}