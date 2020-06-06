<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Category, Attribute, Values, Customer, Attr, Order};
use App\Http\Requests\CheckOutRequest;
use Cart;

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
        $data['product_new'] = Product::where('img', '<>', 'no-img.jpg')->orderby('created_at', 'DESC')->take(4)->get();
        return view('frontend.product.detail', $data);
    }

    function getCheckOut()
    {
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0, '', ',');
        return view('frontend.checkout.checkout', $data);
    }

    function postCheckOut(CheckOutRequest $r)
    {
        $customer = new Customer;
        $customer->full_name = $r->name;
        $customer->address = $r->address;
        $customer->email = $r->email;
        $customer->phone = $r->phone;
        $customer->total = Cart::total(0, '', '');
        $customer->state = 0;
        $customer->save();


        foreach (Cart::content() as $product) {
            $order = new Order;
            $order->name = $product->name;
            $order->price = $product->price;
            $order->quantity = $product->qty;
            $order->img = $product->options->img;
            $order->customer_id = $customer->id;
            $order->save();

            foreach ($product->options->attr as $key => $value) {
                $attr = new Attr;
                $attr->name = $key;
                $attr->value = $value;
                $attr->order_id = $order->id;
                $attr->save();
            }
        }
        Cart::destroy();
        return redirect('/product/complete/' . $customer->id);
    }

    function getComplete($cusId)
    {
        $data['customer'] = Customer::find($cusId);
        return view('frontend.checkout.complete', $data);
    }
}
