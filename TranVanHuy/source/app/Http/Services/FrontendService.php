<?php
namespace App\Http\Services;

use App\Models\Post;

use App\Models\Slider;

use App\Models\Product;

use App\Models\Menunote;
use App\Models\Trademark;
use App\Models\Menulocation;
use App\Models\Promotion;

class FrontendService{
    public function index()
    {
        // Product
        $products = Product::latest()->get();

        // Product discount
        // $discount_products = Product::whereHas('promotions')
        //     ->with('promotions')
        //     ->orderByDesc('id')
        //     ->get();

        // Slider
        $sliders = Slider::latest()->get();

        //Promotion
        $promotions = Promotion::all();
        $count_promotions = $promotions->count();

        // Discount ten products
        $discount_five_products = Product::whereHas('promotions', function ($query) {
                $query->where('active', 1);
            })
            ->with('promotions')
            ->where('status', '=', 1)
            ->orderByDesc('id')
            ->take(5)
            ->get();

        // Five VietnamProducts
        $id_trademarks_vn = Trademark::where('name', 'Việt Nam')->first()->id;
        $five_products = Product::orderBy('id', 'desc')->where('id_trademark', '=', $id_trademarks_vn)->where('status', '=', 1)->limit(5)->get();
        $five_products_promotions = Promotion::whereHas('products', function ($query) use ($five_products) {
            $query->whereIn('id', $five_products->pluck('id'));
        })->get();

        // Eight ImportedProducts
        $three_imported_products = Product::orderBy('id', 'desc')
            ->where('id_trademark', '!=', $id_trademarks_vn)
            ->where('status', '=', 1)
            ->limit(3)
            ->get();
        $five_imported_products = Product::orderBy('id', 'desc')
            ->where('id_trademark', '!=', $id_trademarks_vn)
            ->where('status', '=', 1)
            ->skip(3)
            ->take(5)
            ->get();

        // Post
        $nposts = Post::orderBy('id', 'desc')->first();
        $exceptThisPostId = Post::orderBy('id', 'desc')->first()->id;
        $posts = Post::where('id', '!=',$exceptThisPostId)->get();

        return view('user.page.home', compact('products', 'sliders', 'promotions', 'count_promotions',  'five_products_promotions', 'discount_five_products', 'five_products', 'three_imported_products', 'five_imported_products', 'nposts', 'posts'));
    }
}
