<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productCategories = ProductCategory::all();
        $productCategories = ProductCategory::paginate(5);
        if($search = request()->search){
            //lấy danh sách theo từ khóa tìm kiếm
            $productCategories = ProductCategory::where('name','like','%' . $search . '%')->paginate(5);
        }
        //$search = $request->search ?? '';
        //$productCategory = ProductCategory::where('name','like','%' . $search . '%');

        return view('admin.category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::where('parent_id',0)->get();
        return view('admin.category.create',compact('categories'));
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
        $productCategories = ProductCategory::create($data);
        
        return redirect('admin/category');
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
    public function edit($id)
    {
        $categories = ProductCategory::where('parent_id',0)->get();

        $productCategories = ProductCategory::find($id);
        
        return view('admin.category.edit', compact('productCategories','categories'));
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

        $productCategories = ProductCategory::find($id);
        $productCategories->update($data);

        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCategories = ProductCategory::find($id);
        $productCategories->delete($id);

        return redirect('admin/category');
    }
}
