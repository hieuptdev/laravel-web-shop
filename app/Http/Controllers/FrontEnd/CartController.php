<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    function getCart()
    {

        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0, '', ',');

        return view('frontend.cart.cart', $data);
    }

    public function getAddCart(request $r)
    {
        $product = Product::find($r->id_product);
        if ($r->has('quantity')) {
            $qty = $r->quantity;
        } else {
            $qty = 1;
        }
        Cart::add([
            'id' => $product->product_code,
            'name' => $product->name,
            'qty' => $qty,
            'price' => getPrice($product, $r->attr),
            'weight' => 0,
            'options' => ['img' => $product->img, 'attr' => $r->attr]
        ]);
        return redirect('/cart');
    }

    function getUpdateCart($rowId, $qty)
    {
        Cart::update($rowId,  $qty);
    }

    function delCart($id)
    {
        Cart::remove($id);
        return redirect('/cart');
    }
}
