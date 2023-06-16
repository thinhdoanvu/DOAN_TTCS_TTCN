<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use App\Models\ProductDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ShopController extends Controller
{
    public function show($id, Request $request){
        
        $product = Product::findOrFail($id);

        $now = Carbon::now();
        $today = $now->format('Y/m/d');

        $productView = Product::where('id',$id)->first();
        $productView->product_view = $productView->product_view + 1;
        $productView->save();

        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(),'rating'));
        $countRating = count($product->productComments);
        if ($countRating != 0){
            $avgRating = $sumRating/$countRating;
        }
        
     
        $id = $product->id;
        $comments = ProductComment::leftJoin('products', 'products.id', '=', 'product_comments.product_id')
                        ->where('product_comments.product_id',$id)             
                        ->where('status',1)->get();

        
        $user = $request->session()->get('customer');
        if($user){
            $checkComment = Order::leftJoin('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('order_details.product_id',$id)
            ->where('orders.user_id',$user->id)->count();
        }else{
            $checkComment = 0;
        }
       
        $checkOrders = OrderDetail::leftJoin('products', 'products.id', '=', 'order_details.product_id')
            ->where('order_details.product_id',$id)
            ->count();

        $productColors = Product::leftJoin('product_details','products.id','product_details.product_id')
                                ->where('products.id',$id)
                                ->groupBy('product_details.color')->get();

        $productSizes = Product::leftJoin('product_details','products.id','product_details.product_id')
                                ->where('products.id',$id)
                                ->where('product_details.color',$productColors[0]['color'])
                                ->groupBy('product_details.size')->orderBy('product_details.id','asc')->get();
    

        $relatedProducts = Product::where('product_category_id',$product->product_category_id)
                                    ->whereNotIn('id',[$id])
                                    ->limit(4)->get();
        
        return view('front.shop.show', compact('product','productSizes','productColors','relatedProducts','comments','checkComment','avgRating','checkOrders','user','today'));
    }
    public function changeColor(Request $request){
        if($request->ajax()){
            $color = $request->color;
            $product_id = $request->product_id;
            $listSize = Product::leftJoin('product_details','products.id','product_details.product_id')
                                ->where('product_details.color',$color)
                                ->where('products.id',$product_id)->get();
            $htmlSize = '<span style="margin-right:88px" class="font-weight-bold text-capitalize product-meta-title">Size:</span>';
            foreach ($listSize as $key => $value) {
                $check = ($key==0)? "checked" : "";
                $class = ($key==0)? "product-size-active" : "";
                $htmlSize .='<div class="sc-item">';
                $htmlSize .=    '<input '.$check.' type="radio" id="sm-'.$value['size'].'" name="size" value="'.$value['size'].'">';
                $htmlSize .=    '<label class="size '.$class.'" for="sm-'.$value['size'].'">'.$value['size'].'</label>';
                $htmlSize .='</div>';
            }
            $result['htmlSize'] = $htmlSize;
            return response()->json($result);
        }
    }

    public function postComment(Request $request){
        if($request->rating == null){
            $request->validate([
                'rating' => 'required',
            ],
            [
            'rating.required' => 'Bắt buộc phải chọn số sao.',
            ],);
        }
        ProductComment::create($request->all());
        return redirect()->back()->with('notification', 'Cảm ơn bạn đã đánh giá.');
    }

    public function index(Request $request){

        $categories = ProductCategory::where('parent_id',0)->get();
        $brands = Brand::all();

        $perPage = $request->show ?? 9;
        $sortBy = $request->sort_by ?? 'latest';

        $search = $request->search ?? '';

        $products = Product::where('name','like','%' . $search . '%')->where('inventory','>',0);

        //sản phẩm nổi bật
        $idsBestSeller = OrderDetail::selectRaw('order_details.product_id,SUM(order_details.qty) as amount')
        ->leftJoin('products','products.id','order_details.product_id')
        ->groupBy('order_details.product_id')
        ->orderBy('amount','desc')
        ->limit(5)->pluck('order_details.product_id')->toArray();
      
        $bestSellerProducts = Product::whereIn('id',$idsBestSeller )
                                        ->where('inventory','>',0)
                                        ->get();


        return view('Front.shop.index', compact('products','categories','brands','bestSellerProducts'));
    }
    
    public function load(Request $request){
        if($request->ajax()){
            $page = isset($request->page) ? $request->page : 1;

            $sql = Product::query()->where('id','>',0)->where('inventory','>',0);
            if(isset($request->colors)){
                $colors = $request->colors;
                if(count($colors) > 0){
                    $sql->whereHas('productDetails', function ($query) use ($colors){
                        return $query->whereIn('color',$colors)
                                     ->where('inventory','>',0);
                    });
                }
            }
            if(isset($request->category_id)){
                $ids = ProductCategory::where('parent_id',$request->category_id)->pluck('id')->toArray();
                $ids[] = $request->category_id;
                $sql->whereIn('product_category_id',$ids);
                
            }
            if(isset($request->sizes)){
                $sizes = $request->sizes;
                if(count($sizes) > 0){
                    $sql->whereHas('productDetails', function ($query) use ($sizes){
                        return $query->where('size',$sizes)
                                     ->where('inventory','>',0);
                    });
                }
            }

            if(isset($request->sort_by)){
                $sortBy = $request->sort_by ?? 'latest';
                switch($sortBy){
                    case 'oldest':
                        //$products = Product::orderBy('id');
                        $products = $sql->orderBy('id');
                        break;
                    case 'latest':
                        $products = $sql->orderByDesc('id');
                        break;
                    case 'name-ascending':
                        $products = $sql->orderBy('name');
                        break;
                    case 'name-descending':
                        $products = $sql->orderByDesc('name');
                        break;
                    case 'price-ascending':
                        $products = $sql->orderBy('price');
                        break;
                    case 'price-descending':
                        $products = $sql->orderByDesc('price');
                        break;
                    default:
                        $products = $sql->orderBy('id'); 
                }
            }
            

            if($request->flag == 1){
                $flag = $request->flag;
                $price_min = isset($request->start_price) ? $request->start_price : 0;
                $price_max = isset($request->end_price) ? $request->end_price : 300000;

                $sql->whereBetween('price', [$price_min, $price_max]);
            }

            if(isset($request->search)){
                $search = $request->search ?? '';
                //lấy danh sách sp theo từ khóa tìm kiếm
                $sql->where('name','like','%' . $search . '%')->where('inventory','>',0);
            }
           
            
            $now = Carbon::now();
            $today = $now->format('Y/m/d');
            $products = $sql->paginate(12);          
            return view('Front.shop.load', compact('products','today'))->render();
        }
    }
    
    public function category(Request $request){
        $perPage = $request->show ?? 6;
        $sortBy = $request->sort_by ?? 'latest';
        $categories = ProductCategory::where('parent_id',0)->get();
        $brands = Brand::all();
        //sản phẩm nổi bật
        $idsBestSeller = OrderDetail::selectRaw('order_details.product_id,SUM(order_details.qty) as amount')
                                    ->leftJoin('products','products.id','order_details.product_id')
                                    ->groupBy('order_details.product_id')
                                    ->orderBy('amount','desc')
                                    ->limit(5)->pluck('order_details.product_id')->toArray();
      
        $bestSellerProducts = Product::whereIn('id',$idsBestSeller )
                                        ->where('inventory','>',0)
                                        ->get();


        
        
        
        $name = $request->categoryName;
        $category = ProductCategory::where('slug',$name)->first();

        $category_id = $category->id ?? '';
        // if($category->parent_id == 0){
        //     $ids = ProductCategory::where('parent_id',$category_id)->pluck('id');
        //     $ids[] = $category_id;
        //     $products = Product::whereIn('product_category_id',$ids);
        // }else{
        //     $products = Product::where('product_category_id',$category_id);
        // }


        return view('Front.shop.index', compact('categories','brands','bestSellerProducts','category_id'));

    }

    
    
}
