<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productcate = ProductCategory::orderBy('id', 'ASC')->paginate(5);
        if($key = request()->key)
        {
            $productcate = ProductCategory::orderBy('id', 'ASC')->where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.product.categories.index', compact('productcate'));
    }

    public function create()
    {
        return view('adminshop.product.categories.create');
    }

    public function postcreate(Request $request)
    {
        ProductCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('adminshop.productcategory.index')->with('msg', 'Thêm loại sản phẩm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $result = ProductCategory::find($id);
        return view('adminshop.product.categories.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {
        ProductCategory::find($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('adminshop.productcategory.index')->with('msg', 'Cập nhật loại sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        ProductCategory::find($id)->delete();

        return redirect()->route('adminshop.productcategory.index')->with('msg', 'Xóa loại sản phẩm thành công');
    }
}
