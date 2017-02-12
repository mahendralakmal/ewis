<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/02/2017
 * Time: 19:30
 */

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

    public function add($item, $id){
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
}