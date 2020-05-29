<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{AddCategoryRequest, EditCategoryRequest};
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    function getCategory()
    {
        $data['category'] = Category::all()->toArray();
        return view('backend.category.category', $data);
    }

    function postCategory(AddCategoryRequest $r)
    {
        if (GetLevel(category::all()->toarray(), $r->parent, 1) > 2) {
            return redirect()->back()->with('error', 'Giao diện web không hỗ trợ Danh mục lớn hơn 2 Cấp');
        }
        $category = new Category;
        $category->name = $r->name;
        $category->slug = Str::slug($r->name, '-');
        $category->parent = $r->parent;
        $category->save();
        return redirect()->back()->with('thongbao', 'Đã thêm danh mục : ' . $r->name)->with('status', 'success');
    }

    function getEditCategory($idCate)
    {
        $data['cate'] = Category::findOrFail($idCate);
        $data['category'] = Category::all()->toArray();
        return view('backend.category.editcategory', $data);
    }

    function postEditCategory($idCate, EditCategoryRequest $r)
    {
        $category = Category::findOrFail($idCate);
        $category->name = $r->name;
        $category->slug = Str::slug($r->name, '-');
        $category->parent = $r->parent;
        $category->save();


        return redirect()->back()->with('thongbao', 'Đã sửa danh mục thành công!')->with('status', 'success');
    }

    function delCategory($idCate)
    {
        $category = Category::find($idCate);
        $parent = $category->parent;
        Category::where('parent', $category->id)->update(['parent' => $parent]);
        Category::destroy($idCate);
        return redirect()->back()->with('thongbao', 'Đã xoá danh mục thành công')->with('status', 'danger');
    }
}
