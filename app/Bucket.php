<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Bucket
{
    public $items;
    public $totalQty;
    public $totalPrice;
    protected $product_price = 0;

    public function __construct($oldBucket)
    {
        if ($oldBucket) {
            $this->items = $oldBucket->items;
            $this->totalQty = $oldBucket->totalQty;
            $this->totalPrice = $oldBucket->totalPrice;
        } else {
            $this->items = null;
        }
    }

    public function add($item, $id, $special_price, $qty)
    {
        if ($item->product->vat_apply)
            $product_price = $special_price + $special_price * $item->product->vat / 100;
        else
            $product_price = $special_price;

        $storedItem = ['qty' => $qty, 'price' => $product_price, 'item' => $item->product];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
                $storedItem['qty'] += $qty;
            }
        }

        $storedItem['price'] = $product_price * $storedItem['qty'];
        $storedItem['unit_price'] = $special_price;
        $this->items[$id] = $storedItem;
        $this->totalQty += $qty;

//        $this->totalPrice = $this->totalPrice + $storedItem['price'];
        $this->totalPrice = $this->totalPrice + ($product_price * $qty);

    }

    public function remove($part_no)
    {
        $this->totalQty -= $this->items[$part_no]['qty'];
        $this->totalPrice -= $this->items[$part_no]['price'];
        unset($this->items[$part_no]);
    }
}