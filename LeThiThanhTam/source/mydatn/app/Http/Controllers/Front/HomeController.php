<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Rating;
use App\Models\Ratings;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        
        //sản phẩm nổi bật
        $idsBestSeller = OrderDetail::selectRaw('order_details.product_id,SUM(order_details.qty) as amount')
        ->leftJoin('products','products.id','order_details.product_id')
        ->groupBy('order_details.product_id')
        ->orderBy('amount','desc')
        ->limit(4)->pluck('order_details.product_id')->toArray();
      
        $bestSellerProducts = Product::whereIn('id',$idsBestSeller )
                                        ->where('inventory','>',0)
                                        ->get();
        $bestSellerPro = Product::whereIn('id',$idsBestSeller )
        ->where('inventory','>',0)
        ->paginate(4);
        //dd($bestSellerPro);
        $now = Carbon::now();
        $today = $now->format('Y/m/d');
        $days_ago = date('Y-m-d', strtotime('-60 days', strtotime($today)));
        $newProducts = Product::where('created_at', '>=', $days_ago)->get();
        //dd($newProducts);
        $newProducts = Product::
                                where('inventory','>',0)
                                ->where('created_at', '>=', $days_ago)
                                ->orderBy('id','DESC')->take(4)->get();

        //dd($newProducts);
        $newPro = Product::where('created_at', '>=', $days_ago)->get();
        $newPro = Product::
                        where('inventory','>',0)
                        ->where('created_at', '>=', $days_ago)
                        ->orderBy('id','DESC')->take(4)->get();

        //dd($newPro);
        //lấy danh sách 3 blog mới nhất từ database
        $blogs = Blog::orderBy('id','desc')->limit(3)->get();


        return view('front.index',compact('blogs','newProducts','bestSellerProducts','bestSellerPro','newPro','today','days_ago'));
    }
}
