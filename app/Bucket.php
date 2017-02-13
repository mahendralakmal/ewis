<?php

namespace App;

class Bucket
{
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

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

    public function add($item, $part_no){
        $storedItem = ['qty' => 0, 'price' => $item->default_price, 'item' => $item];
        if ($this->items) {
            if(array_key_exists($part_no, $this->items)){
                $storedItem = $this->items[$part_no];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->default_price * $storedItem['qty'];
        $this->items[$part_no] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->default_price;
    }
}