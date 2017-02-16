<?php

namespace App;

class Bucket
{
    public $items;
    public $totalQty;
    public $totalPrice;

    public function _construct($oldBucket){
        if ($oldBucket) {
            $this->items = $oldBucket->items;
            $this->totalQty = $oldBucket->totalQty;
            $this->totalPrice = $oldBucket->totalPrice;
        }
        else {
            $this->items = null;
        }
    }

    public function add($item, $id){
        $storedItem = ['qty'=>0, 'price' => $item->default_price, 'item' => $item];
        if ($this->items) {
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->default_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->default_price;
    }
}