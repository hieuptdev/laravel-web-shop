<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, Attribute, Values, Category, Variant};
use App\Http\Requests\{AddProductRequest, AddAttrRequest, AddValueRequest, EditAttrRequest, EditValueRequest, EditProductRequest};
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //Product
    function getListProduct()
    {

        $data['product'] = Product::paginate(7);

        return view('backend.product.listproduct', $data);
    }

    function getAddProduct()
    {
        $data['category'] = Category::all();
        $data['attrs'] = Attribute::all();
        return view('backend.product.addproduct', $data);
    }

    function postAddProduct(AddProductRequest $r)
    {

        $product = new Product;
        $product->product_code = $r->product_code;
        $product->name = $r->product_name;
        $product->price = $r->product_price;
        $product->featured = $r->featured;
        $product->state = $r->product_state;

        $product->info = $r->info;

        $product->describe = $r->description;


        if ($r->hasFile('img')) {
            $file = $r->img;
            $fileName = Str::slug($r->name, '_') . '.' . $file->getClientOriginalExtension();
            $file->move('backend/img', $fileName);
            $product->img = $fileName;
        } else {
            $product->img = 'no-img.jpg';
        }
        $product->category_id = $r->category;
        $product->save();
        $mang = array();
        foreach ($r->attr as $value) {
            foreach ($value as $item) {
                $mang[] = $item;
            }
        }
        $product->values()->Attach($mang);


        $variant = get_combinations($r->attr);

        foreach ($variant as $var) {
            $vari = new variant;
            $vari->product_id = $product->id;
            $vari->save();
            $vari->values()->Attach($var);
        }


        return redirect('/admin/product/add-variant/' . $product->id);
    }

    function getEditProduct(request $r, $idPrd)
    {
        $data['product'] = Product::find($idPrd);
        $data['category'] = Category::all();
        $data['attrs'] = Attribute::all();
        return view('backend.product.editproduct', $data);
    }

    function postEditProduct(EditProductRequest $r, $idPrd)
    {
        $product = Product::find($idPrd);
        $product->product_code = $r->product_code;
        $product->name = $r->product_name;
        $product->price = $r->product_price;
        $product->featured = $r->featured;
        $product->state = $r->product_state;

        $product->info = $r->info;

        $product->describe = $r->description;


        if ($r->hasFile('product_img')) {
            if (file_exists($product->img)) {
                if ($product->img == 'no-img.jpg') {
                    unlink('backend/img/', $product->img);
                }
            }

            $file = $r->product_img;
            $fileName = Str::slug($r->name, '_') . '.' . $file->getClientOriginalExtension();
            $file->move('backend/img', $fileName);
            $product->img = $fileName;
        }
        $product->category_id = $r->category;
        $product->save();

        $mang = array();
        foreach ($r->attr as $value) {
            foreach ($value as $item) {
                $mang[] = $item;
            }
        }
        $product->values()->Sync($mang);
        $variant = get_combinations($r->attr);

        foreach ($variant as $var) {
            if (check_var($product, $var)) {
                $vari = new variant;
                $vari->product_id = $product->id;
                $vari->save();
                $vari->values()->Attach($var);
            }
        }





        return redirect()->back()->with('thongbao', 'Đã sửa thành công!')->with('status', 'success');
    }


    function delProduct($idPrd)
    {
        Product::destroy($idPrd);
        return redirect()->back()->with('thongbao', 'Đã xoá sản phẩm thành công')->with('status', 'danger');
    }

    //Attr////////////////////////////////////////////////
    function addAttr(AddAttrRequest $r)
    {
        $attr = new Attribute;
        $attr->name = $r->attr_name;
        $attr->save();
        return redirect()->back()->with('thongbao', 'Đã thêm thuộc tính thành công : ' . $r->attr_name)->with('status', 'success');
    }

    function getDetailAttr()
    {
        $data['attrs'] = Attribute::all();
        return view('backend.attr.attr', $data);
    }



    function getEditAttr($id)
    {

        $data['attr'] = Attribute::find($id);
        return view('backend.attr.editattr', $data);
    }

    function postEditAttr(EditAttrRequest $r, $id)
    {
        $attr = Attribute::find($id);
        $attr->name = $r->attr_name;
        $attr->save();

        return redirect()->back()->with('thongbao', 'Đã sửa thuộc tính thành công : ' . $r->attr_name)->with('status', 'success');
    }

    function delAttr($id)
    {
        Attribute::destroy($id);
        return redirect()->back()->with('thongbao', 'Đã xoá thuộc tính thành công ')->with('status', 'danger');
    }



    //Value////////////////////////////////////////////////
    function addValue(AddValueRequest $r)
    {
        $value = new Values;
        $value->attr_id = $r->attr_id;
        $value->value = $r->value_name;
        $value->save();
        return redirect()->back()->with('thongbao', 'Đã thêm giá trị thuộc tính : ' . $r->value_name)->with('status', 'success');
    }

    function getEditValue($id)
    {
        $data['value'] = Values::find($id);
        return view('backend.variant.editvalue', $data);
    }

    function postEditValue(EditValueRequest $r, $id)
    {
        $value = Values::find($id);
        $value->value = $r->value_name;
        $value->save();
        return redirect()->back()->with('thongbao', 'Đã sửa giá trị thuộc tính thành công')->with('status', 'success');
    }

    function delValue($id)
    {
        Values::destroy($id);
        return redirect()->back()->with('thongbao', 'Đã xoá trị thuộc tính')->with('status', 'danger');
    }
    //Variant/////////////////////////////////////////////
    function getAddVariant($id)
    {
        $data['product'] = Product::find($id);
        return view('backend.variant.addvariant', $data);
    }

    public function postAddVariant(request $r, $id)
    {
        foreach ($r->variant as $key => $value) {
            $vari = variant::find($key);
            $vari->price = $value;
            $vari->save();
        }


        return redirect('/admin/product')->with('thongbao', 'Đã thêm thành công!')->with('status', 'success');
    }

    function getEditVariant($id)
    {
        $data['product'] = product::find($id);
        return view('backend.variant.editvariant', $data);
    }

    function postEditVariant(request $request, $id)
    {
        foreach ($request->variant as $key => $value) {
            $vari = variant::find($key);
            $vari->price = $value;
            $vari->save();
        }

        return redirect('admin/product')->with('thongbao', 'Đã Sửa thành công thành công!')->with('status', 'success');
    }

    function delVariant($id)
    {
        Variant::destroy($id);
        return redirect()->back()->with('thongbao', 'Đã xoá biến thể')->with('status', 'danger');
    }
}
