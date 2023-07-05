<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $promotion = Promotion::orderBy('id', 'ASC')->paginate(5);
        if($request->button_active){
            $active_promotion = Promotion::find($request->id_promotion);
            return response()->json(['message' => 'Value updated successfully']);
        }
        if($key = request()->key)
        {
            $promotion = Promotion::orderBy('id', 'ASC')->where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.product.promotions.index', compact('promotion'));
    }

    public function postindex(Request $request)
    {
        $promotion = Promotion::find($request->id_promotion);

        $promotion->update(['active' => $request->active]);

        if ($request->active == 0) {
            $promotion->products()->update(['price_discount' => null]);
        }
        if ($request->active == 1) {
            foreach($promotion->products as $product) {
                $price = $product->price;
                if($promotion->type == "Giảm theo %"){
                    $price_discount = $price - ($price * $promotion->discount_rate / 100);
                }else{
                    if($promotion->type == "Giảm theo số tiền"){
                        $price_discount = $price - $promotion->discount_rate;
                    }else{
                        $price_discount = $promotion->discount_rate;
                    }
                }

                $product->price_discount = $price_discount;
                $product->save();
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_arr = ProductCategory::all()->pluck('name', 'id')->toArray();
        $product_arr = Product::all()->pluck('name', 'id')->toArray();

        return view('adminshop.product.promotions.create', compact('category_arr', 'product_arr'));
    }

    public function ajaxSearch()
    {
        $search = Product::where('status', 1)->where('price_discount', null)->search()->get();

        return $search;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postcreate(Request $request)
    {
        $dataInsert = [
            'name' => $request->name,
            'type' => $request->type,
            'discount_rate' => $request->discount_rate,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ];

        $data = Promotion::create($dataInsert);
        $data->products()->attach($request->input('promotionproduct', []));

        $products = $request->input('promotionproduct', []);

        foreach($products as $product_id) {
            $product = Product::find($product_id);
            $price = $product->price;
            if($data->type == "Giảm theo %"){
                $price_discount = $price - ($price * $data->discount_rate / 100);
            }else{
                if($data->type == "Giảm theo số tiền"){
                    $price_discount = $price - $data->discount_rate;
                }else{
                    $price_discount = $data->discount_rate;
                }
            }

            $product->price_discount = $price_discount;
            $product->save();
        }

        return redirect()->route('adminshop.promotion.index')->with('msg', 'Thêm chương trình khuyến mãi thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Promotion::findOrFail($id);
        $promotionproducts = Product::all();
        $option = $result->products()->pluck('product_id')->toArray();
        return view('adminshop.product.promotions.edit', compact('result', 'promotionproducts', 'option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $today = Carbon::now();
        if($request->date_end <= $today){
            $active = 0;
        }else{
            $active = 1;
        }

        $dataUpdate = [
            'name' => $request->name,
            'type' => $request->type,
            'discount_rate' => $request->discount_rate,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'active' => $active,
        ];

        $data = Promotion::find($id);
        $data->update($dataUpdate);
        $data->products()->sync($request->input('promotionproduct', []));

        $products = $request->input('promotionproduct', []);

        foreach($products as $product_id) {
            $product = Product::find($product_id);
            $price = $product->price;
            if($data->type == "Giảm theo %"){
                $price_discount = $price - ($price * $data->discount_rate / 100);
            }else{
                if($data->type == "Giảm theo số tiền"){
                    $price_discount = $price - $data->discount_rate;
                }else{
                    $price_discount = $data->discount_rate;
                }
            }

            $product->price_discount = $price_discount;
            $product->save();
        }

        return redirect()->route('adminshop.promotion.index')->with('msg', 'Cập nhật chương trình khuyến mãi thành công');
    }

    public function updateDiscordNull(Request $request)
    {
        Product::find($request->id_product)->update([
            'price_discount' => null
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $dataDelete = Promotion::find($id);
        $products = $dataDelete->products;

        foreach($products as $product) {
            $product->price_discount = null;
            $product->save();
        }

        $dataDelete->products()->detach();
        $dataDelete->delete();

        return redirect()->route('adminshop.promotion.index')->with('msg', 'Xóa chương trình khuyến mãi thành công');
    }
}
