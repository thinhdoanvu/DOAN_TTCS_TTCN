<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {
        $product = Product::find($product_id);
        $productDetails = $product->productDetails;

        return view('admin.product.detail.index', compact('product','productDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $product = Product::find($product_id);

        return view('admin.product.detail.create', compact('product'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $data = $request->all();

        ProductDetail::create($data);
        $this->updateQty($product_id);

        return redirect('admin/product/' . $product_id . '/detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id, $product_detail_id)
    {
        $product = Product::find($product_id);
        $productDetail = ProductDetail::find($product_detail_id);

        return view('admin.product.detail.edit', compact('product','productDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, $product_detail_id)
    {
        $data = $request->all();
        $productDetail = ProductDetail::find($product_detail_id)->update($data);
        $this->updateQty($product_id);

        return redirect('admin/product/' . $product_id . '/detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $product_detail_id)
    {
        ProductDetail::find($product_detail_id)->delete();

        return redirect('admin/product/' . $product_id . '/detail');
    }

    //update Qty
    public function updateQty($product_id){
        $product = Product::find($product_id);

        $productDetails = $product->productDetails;

        //lấy một cột trong một mảng và trả về giá trị từ một cột duy nhất đó(array_column)
        $totalQty = array_sum(array_column($productDetails->toArray(), 'inventory'));

        $product->update(['inventory' => $totalQty]);
        //Product::update(['qty' => $totalQty], $product_id);
    }
}
