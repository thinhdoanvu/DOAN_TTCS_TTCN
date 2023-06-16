<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Utilities\Common;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $blogs = Blog::paginate(10);
        //Lấy dữ liệu từ khóa tìm kiếm = request
        if($search = request()->search){
            //lấy danh sách theo từ khóa tìm kiếm
            $blogs = Blog::where('title','like','%' . $search . '%')->paginate(5);
        }
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategories = BlogCategory::all();
        return view('admin.blog.create',compact('blogCategories'));
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
        //xử lí file:
        //hasFile xac dinh xem file image cos ton tai hay ko
        if($request->hasFile('image')){
            $data['image'] = Common::uploadFile($request->file('image'), 'front/img/blog');
        }
        $blog = Blog::create($data);

        return redirect('admin/blog/' . $blog->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blogCategories = BlogCategory::all();
        return view('admin.blog.edit',compact('blog','blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->all();

         //Xử lí file ảnh
         if($request->hasFile('image')){
            //Them file ms
            $data['image'] = Common::uploadFile($request->file('image'), 'front/img/blog');

            //Xóa file cũ
            // $file_name_old = $request->get('image_old');
            // if($file_name_old != ''){
            //     gc_collect_cycles();
            //     unlink('front/img/blog/' . $file_name_old);
            // } 
            $file_name = Blog::find($blog->id)->image;
            if($file_name != ''){
            unlink('front/img/blog/' . $file_name);
        }
        }

        //cập nhật dữ liệu
        //User::update($data, $user->id);
        $blog = Blog::find($blog->id);
        $blog->update($data);

        return redirect('admin/blog/' . $blog->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete($blog->id);

        //Xóa file
        $file_name = $blog->image;
        if($file_name != ''){
            unlink('front/img/blog/' . $file_name);
        }

        return redirect('admin/blog');
    }


}
