<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Trademark;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Traits\StoreImageTrait;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use StoreImageTrait;

    public function index(){
        $productList = Product::orderBy('id', 'ASC')->paginate(5);
        if($key = request()->key)
        {
            $productList = Product::orderBy('id', 'ASC')->where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.product.index', compact('productList'));
    }

    public function create(){
        $units = Unit::all();
        $categories = ProductCategory::all();
        $trademarks = Trademark::all();
        $suppliers = Supplier::all();
        return view('adminshop.product.create', compact('units', 'categories', 'trademarks', 'suppliers'));
    }

    public function postcreate(Request $request)
    {
        $slug = Str::slug($request->name, '-');
        $productInsert = [
            'name' => $request->name,
            'amount' => $request->amount,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            'id_unit' => $request->id_unit,
            'id_trademark' => $request->id_trademark,
            'id_cate' => $request->id_cate,
            'id_suppli' => $request->id_suppli,
        ];

        $productImage = $this->storageTraitUpLoad($request, 'image_path', 'products');
        if(!empty($productImage)){
            $productInsert['image_name'] = $productImage['file_name'];
            $productInsert['image_path'] = $productImage['file_path'];
        }

        $data = Product::create($productInsert);
        $data->slug()->create([
            'nameSlug' => $slug
        ]);

        return redirect()->route('adminshop.product.index')->with('msg', 'Thêm sản phẩm thành công');
    }

    public function edit($id, Request $request)
    {
        $productDetail = Product::find($id);
        $units = Unit::all();
        $categories = ProductCategory::all();
        $trademarks = Trademark::all();
        $suppliers = Supplier::all();
        return view('adminshop.product.edit', compact('productDetail', 'units', 'categories', 'trademarks', 'suppliers'));
    }

    public function updateProduct(Request $request, $id)
    {
        $dataUpdate = [
            'name' => $request->name,
            'amount' => $request->amount,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
            'id_unit' => $request->id_unit,
            'id_trademark' => $request->id_trademark,
            'id_cate' => $request->id_cate,
            'id_suppli' => $request->id_suppli,
        ];

        $productImage = $this->storageTraitUpLoad($request, 'image_path', 'products');
        if(!empty($productImage)){
            $dataUpdate['image_name'] = $productImage['file_name'];
            $dataUpdate['image_path'] = $productImage['file_path'];
        }

        Product::find($id)->update($dataUpdate);

        return redirect()->route('adminshop.product.index')->with('msg', 'Cập nhật sản phẩm thành công');
    }

    public function delete($id)
    {
        $product_data = Product::find($id);
        $product_data->delete();
        $product_data->slug()->delete();
        return redirect()->route('adminshop.product.index')->with('msg', 'Xóa sản phẩm thành công');
    }
}
