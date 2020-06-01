<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Category, Attribute, Values};

class ProductController extends Controller
{
    function getShop(request $r)
    {
        if ($r->category) {

            $data['product'] = Category::find($r->category)->product()->where('img', '<>', 'no-img.jpg')->paginate(12);
        } else if ($r->start) {
            $data['product'] = Product::whereBetween('price', [$r->start, $r->end])->paginate(12);
        } else if ($r->value) {
            $data['product'] = Values::find($r->value)->product()->where('img', '<>', 'no-img.jpg')->paginate(12);
        } else {
            $data['product'] = Product::where('img', '<>', 'no-img.jpg')->paginate(12);
        }
        // dd($r->category);
        $data['category'] = Category::all();
        $data['attrs'] = Attribute::all();

        return view('frontend.product.shop', $data);
    }

    function getDetail($idPrd)
    {
        $data['product'] = Product::find($idPrd);
        $data['values'] = Values::all();
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
