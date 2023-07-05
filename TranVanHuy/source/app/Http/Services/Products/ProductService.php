<?php
namespace App\Http\Services\Products;

use App\Models\Product;
use App\Models\Slug;
use App\Models\Trademark;

class ProductService{

    // User
    // public function index(){
    //     $posts = Post::orderBy('id', 'ASC')->paginate(5);
    //     return view('adminshop.post.index', compact('posts'));
    // }

    // public function postIndex()
    // {
    //     $posts = Post::orderBy('id', 'desc')->paginate(5);
    //     $threeposts = Post::orderBy('id', 'desc')->limit(3)->get();
    //     return view('user.page.blogs.post', compact('posts', 'threeposts'));
    // }

    public function productDetail($slug)
    {
        $slug = $slug;
        $slugProduct = Slug::where('nameSlug', $slug)->first();
        $trademarks = Trademark::all();
        $productDetails = Product::findOrFail($slugProduct->slugable_id);
        return view('user.page.products.productDetail', compact('productDetails', 'trademarks','slugProduct', 'slug'));
    }
}
