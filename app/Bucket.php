<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Bucket
{
    protected $fillable=['Qty'];
    public $items;
    public $totalQty;
    public $totalPrice;

    public function __construct($oldBucket){
        if ($oldBucket) {
            $this->items = $oldBucket->items;
            $this->totalQty = $oldBucket->totalQty;
            $this->totalPrice = $oldBucket->totalPrice;
        }
        else {
            $this->items = null;
        }
    }

    public function add( $item, $id){
        $storedItem = ['qty'=> $this->fillable=['Qty'], 'price' => $item->default_price, 'item' => $item];
        if ($this->items) {
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['price'] = $item->default_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->default_price;
    }
}