<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;

class BlogController extends Controller
{
    //
    public function index(){
        $blogs = Blog::all();
        $blogs = Blog::paginate(4);

        return view('front.blog.index', compact('blogs'));
    }

    public function detail($id, Request $request){
        $blogs = Blog::findOrFail($id);
        $id = $blogs->id;
        $relatedBlogs = Blog::where('blog_category_id',$blogs->blog_category_id)
        ->whereNotIn('id',[$id])
        ->limit(4)->get();

        $blog = Blog::where('id',$id)->first();
        $blog->blog_view = $blog->blog_view + 1;
        $blog->save();
        
        $user = $request->session()->get('customer');
        return view('front.blog.detail', compact('blogs','user','relatedBlogs'));

    }

    public function postComment(Request $request){
        //thêm tất cả dữ liệu vào bảng productComment
        BlogComment::create($request->all());

        //quay lai trang truoc(chi tiet san pham)
        return redirect()->back();
    }

    public function category(Request $request){

        $name = $request->categoryName;
        $category = BlogCategory::where('slug',$name)->first();
        $blogs = Blog::where('blog_category_id',$category->id)->paginate(4);
        //dd($blogs);

        return view('front.blog.index', compact('blogs'));
    }
}
