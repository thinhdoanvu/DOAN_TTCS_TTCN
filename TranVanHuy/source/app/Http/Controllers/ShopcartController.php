<?php

namespace App\Http\Controllers;

use App\Http\Services\ShopCarts\CartService;
use App\Models\Cart;
use App\Models\Member;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopcartController extends Controller
{
    protected $carts;

    public function __construct(CartService $carts)
    {
        $this->carts = $carts;
    }

    public function index()
    {
        $memberIds = Cart::pluck('member_id')->unique()->toArray();
        $members = Member::all();
        return view('adminshop.cart.index', compact('memberIds', 'members'));
    }

    public function indexDetail($id)
    {
        $productIds = Cart::where('member_id', $id)->get();
        $products = Product::all();
        return view('adminshop.cart.detail', compact('productIds', 'products'));
    }

    public function store(Request $request, $slug)
    {
        $cartProduct = $this->carts->cartProduct($request->iduser, $request->idproduct, $slug, $request->price, $request->amount);
        return $cartProduct;
    }

    public function cartDetail()
    {
        $user_id = Auth::guard('webuser')->user()->id;
        $cartDetails = Cart::where('member_id', $user_id)->get();
        $count_cartDetails = $cartDetails->count();
        $products = Product::all();
        $units = Unit::all();
        $total = Cart::where('member_id', $user_id)->sum('total');

        return view('user.page.cart.detail', compact('cartDetails', 'count_cartDetails', 'total', 'products', 'units'));
    }

    public function update(Request $request)
    {
        // Kiểm tra và cập nhật giá trị amount trong bảng cart
        if ($request->amount >= 1) {

            $cartDetail = Cart::find($request->cartDetailId);
            $cartDetail->where('product_id', $request->productId)
                ->update([
                    'amount' => $request->amount,
                    'total' => $request->amount * $cartDetail->price
                ]);
            $totalFormatted = number_format($request->amount * $cartDetail->price) . 'đ';
            $cartDetailTotal = Cart::where('member_id', $request->memberId)->sum('total');
            $inp_total_sum = $cartDetailTotal;
            $total_sum = number_format($cartDetailTotal) . 'đ';
            $response = [
                'success' => true,
                'totalFormatted' => $totalFormatted,
                'inp_total_sum' => $inp_total_sum,
                'total_sum' => $total_sum,
            ];
        } else {
            $response = [
                'success' => false,
            ];
        }

        return response()->json($response);
    }

    public function deleteCartItem($id)
    {
        Cart::find($id)->delete();
        return redirect()->back();
    }
}
