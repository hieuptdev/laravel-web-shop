<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,Customer};
class OrderController extends Controller
{
    function getOrder()
    {
        $data['customer']=Customer::all();
       
        return view('backend.order.order',$data);
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
