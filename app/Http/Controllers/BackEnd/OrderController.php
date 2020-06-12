<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order, Customer};

class OrderController extends Controller
{
    function getOrder()
    {
        $data['customer'] = Customer::where('state', 0)->orderby('created_at', 'DESC')->paginate(10);

        return view('backend.order.order', $data);
    }


    function getDetailOrder($idCus)
    {
        $data['customer'] = Customer::find($idCus);

        return view('backend.order.detailorder', $data);
    }


    function getProcessOrder()
    {
        return view('backend.order.orderprocessed');
    }
}
