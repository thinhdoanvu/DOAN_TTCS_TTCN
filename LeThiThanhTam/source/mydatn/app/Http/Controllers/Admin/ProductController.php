<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $products = Product::paginate(100);
        if($search = request()->search){
            //lấy danh sách theo từ khóa tìm kiếm
            $products = Product::where('name','like','%' . $search . '%')->paginate(10);
        }

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $brands = Brand::all();
        $categories = ProductCategory::all();

        return view('admin.product.create', compact('products','brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['inventory'] = 0; //khi tạo ms sp số lượng bằng 0
        //$data['featured'] = 0;
        $product = Product::create($data);

        return redirect('admin/product/' . $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::all();
        $categories = ProductCategory::all();

        return view('admin.product.edit', compact('product','brands','categories'));
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
        $data = $request->all();
        $product = Product::find($id);
        $product->update($data);
        return redirect('admin/product/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete($id);

        return redirect('admin/product');
    }

    // public function getSearch(Request $request)
    // {
    //     if($request->ajax()){
    //         $output = '';
    //         $query = $request->query;
    //         if ($query != ''){
    //             $data = Product::where('name','like','%'.$query.'%')
    //             ->orWhere('price','like','%'.$query.'%')
    //             ->orWhere('tag','like','%'.$query.'%')
    //             ->orWhere('sku','like','%'.$query.'%')
    //             ->orderBy('id', 'desc')
    //             ->get();
    //         } else {
    //             $data = Product::orderBy('id','desc')->get();
    //         }

    //         $total_row = $data->count();
    //         if ($total_row >0){
    //             foreach($data as $row){
    //                 $output .= '
    //                 <tr>
    //                     <td>'.$row->name.'</td>
    //                     <td>'.$row->price.'</td>
    //                     <td>'.$row->tag.'</td>
    //                 </tr>
    //                 ';
    //             }

    //         } else {
    //             $output = '
    //             <tr>
    //                 <td align="center" colspan="5"> No Data Found</td>
    //             </tr>
    //             ';
    //         }
    //         $data = array(
    //             'table_data' => $output,
    //             'total_data' => $total_row
    //         );
    //         echo json_encode($data);
    //     }
    // }
}
