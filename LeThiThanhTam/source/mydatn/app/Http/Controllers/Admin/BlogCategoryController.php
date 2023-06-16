<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogCategories = BlogCategory::all();
        $blogCategories = BlogCategory::paginate(5);
        if($search = request()->search){
            //lấy danh sách theo từ khóa tìm kiếm
            $blogCategories = BlogCategory::where('name','like','%' . $search . '%')->paginate(5);
        }
        //$search = $request->search ?? '';
        //$productCategory = ProductCategory::where('name','like','%' . $search . '%');

        return view('admin.blogCategory.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blogCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);
        $blogCategories = BlogCategory::create($data);
        
        return redirect('admin/blogCategory');
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
        //
        $blogCategories = BlogCategory::find($id);
        return view('admin.blogCategory.edit', compact('blogCategories'));
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
        //
        $data = $request->all();

        $blogCategories = BlogCategory::find($id);
        $data['slug'] = Str::slug($blogCategories->name);
        $blogCategories->update($data);

        return redirect('admin/blogCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blogCategories = BlogCategory::find($id);
        $blogCategories->delete($id);

        return redirect('admin/blogCategory');
    }
}
