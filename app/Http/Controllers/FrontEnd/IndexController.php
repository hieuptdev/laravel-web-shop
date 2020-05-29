<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    function getIndex()
    {
        $data['product'] = Product::where('img','<>','no-img.jpg')->paginate(12);
        return view('frontend.index', $data);
    }

    function getAbout()
    {
        return view('frontend.about');
    }

    function getContact()
    {
        return view('frontend.contact');
    }
}
