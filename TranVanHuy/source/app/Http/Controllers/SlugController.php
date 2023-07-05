<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\Product;

use App\Models\Slug;

use Illuminate\Http\Request;

use App\Http\Services\Posts\PostService;
use App\Http\Services\Products\ProductService;

class SlugController extends Controller
{
    protected $posts, $products;

    public function __construct(PostService $posts, ProductService $products){
        $this->posts = $posts;
        $this->products = $products;
    }

    public function slug($slug){
        $type = Slug::where('nameSlug', $slug)->first();
        if(isset($type->slugable_type)){
            switch ($type->slugable_type) {
                case Post::class:
                    // Hiển thị trang chi tiết bài viết
                    $post_detail = $this->posts->postDetail($slug);
                    return $post_detail;
                    break;

                case Product::class:
                    // Hiển thị trang chi tiết sản phẩm
                    $product_detail = $this->products->productDetail($slug);
                    return $product_detail;
                    break;

                default:
                    dd('default');
                    break;
            }
        }
        else{
            return redirect()->route('home');
        }
    }
}
