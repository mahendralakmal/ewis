<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Bucket;
use App\Product;

class BucketController extends Controller
{
    public function getAddToBucket(Request $request, $part_no)
    {
        $product = Product::where('part_no',$request->id)->first();
        $oldBucket = Session::has('bucket') ? Session::get('bucket') : null;
        $bucket = new Bucket($oldBucket);
        $bucket->add($product, $product->part_no);
        $request->session()->put('bucket', $bucket);
//        dd($request->session()->get('bucket'));
        return redirect('/');
    }

    public function getBucket() {
        if (!Session::has('bucket')) {
            return view('bucket');
        }
            $oldBucket = Session::get('bucket');
            $bucket = new Bucket($oldBucket);
            return view('bucket', ['products' => $bucket->items, 'totalQty' => $bucket->totalQty] );

    }

}
