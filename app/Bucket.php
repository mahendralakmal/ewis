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

    public function add($item, $id, $qty)
    {
         if ($item->product->vat_apply){
            $product_price= $item->special_price + $item->special_price*15/100;
        }
             else {
            $product_price = $item->special_price;

        }
        $storedItem = ['qty' => $qty, 'price' => $product_price, 'item' => $item->product];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
                $storedItem['qty'] += $qty;
            }
        }
        $storedItem['price'] = $product_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty += $qty;
        $this->totalPrice = $this->totalPrice+$storedItem['price'];
    }
    public function remove($part_no)
    {
        $this->totalQty -= $this->items[$part_no]['qty'];
        $this->totalPrice -= $this->items[$part_no]['price'];
        unset($this->items[$part_no]);
    }
}