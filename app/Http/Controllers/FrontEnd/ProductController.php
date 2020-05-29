<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Category};

class ProductController extends Controller
{
    function getShop(request $r)
    {
        if ($r->category) {
            $data['product'] = Category::find($r->category)->product()->where('img', '<>', 'no-img.jpg')->paginate(12);
        }

        else if($r->start){
            $data['product'] = Product::whereBetween('price',[$r->start,$r->end])->paginate(12);
        }
        
        else {
            $data['product'] = Product::where('img', '<>', 'no-img.jpg')->paginate(12);
        }

        $data['category'] = Category::all();

        return view('frontend.product.shop', $data);
    }

    function getDetail($idPrd)
    {
        $data['product'] = Product::find($idPrd);
        return view('frontend.product.detail', $data);
    }

    function getCheckOut()
    {
        return view('frontend.checkout.checkout');
    }

    function getComplete()
    {
        return view('frontend.checkout.complete');
    }
}
