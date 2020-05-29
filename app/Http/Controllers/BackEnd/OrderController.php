<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function getOrder()
    {
        return view('backend.order.order');
    }


    function getDetailOrder()
    {
        return view('backend.order.detailorder');
    }


    function getProcessOrder()
    {
        return view('backend.order.orderprocessed');
    }
}
