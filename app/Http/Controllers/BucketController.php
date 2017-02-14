<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Bucket;
class BucketController extends Controller
{

    public function getBucket() {
        if (!Session::has('bucket')){
            return view('bucket', ['products' => null]);
            $oldBucket = Session::get('bucket');
            $bucket = new Bucket($oldBucket);
            return view('bucket', ['products' => $bucket->items, 'totalQty' => $bucket->totalQty] );
        }
    }

}
