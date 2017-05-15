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
        $storedItem = ['qty' => $qty, 'price' => $item->default_price, 'item' => $item->product];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
                $storedItem['qty'] += $qty;
            }
        }
        $storedItem['price'] = $item->default_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty += $qty;
        $this->totalPrice += $storedItem['price'];
    }

    public function forget($product)
    {
//        dd($this->items[$product]);
        return $product;
//      $item = $product->item;
//      dd($product);
//        $this->items[$item_id]['qty'] = $this->items[$item_id]['qty'] - 1;
//        $this->items[$item_id]['price'] -= $this->items[$item_id]['item']['price'];
//        $this->totalQty -= $this->items[$item_id]['qty'];
//        $this->totalPrice -= $this->items[$item_id]['item']['price'];
//        unset($this->items['item']);

//        return back();
    }
}