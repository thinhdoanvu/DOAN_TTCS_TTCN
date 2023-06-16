<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function print_order($order_id)
    {
        $order = Order::find($order_id);
  
        $data = [
            'date' => date('m/d/Y'),
            'order' => $order
        ]; 

        $pdf = Pdf::loadView('admin.order.hoadonPDF', $data);

        return $pdf->stream();

    }


    public function index(Request $request)
    {
       
        $sql = Order::query()->where('id','>',0);
        
        if(isset($request->search) && $request->search != ''){
            $sql->where('first_name','LIKE', '%'.$request->search.'%');
        }
        
        $orders = $sql->orderBy('id','DESC')
        ->paginate(10);       
       
        // $orders = Order::all();

        // $orders = Order::orderByDesc('id')->paginate(10);
        // if($search = request()->search){
        //     //lấy danh sách theo từ khóa tìm kiếm
        //     $orders = Order::where('first_name','like','%' . $search . '%')->paginate(5);
        // }
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::find($id);
        return view('admin.order.show', compact('orders'));
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
        $orders = Order::find($id);
        return view('admin.order.edit', compact('orders'));
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
        $order = Order::find($id);
        
        if($data["status"] != $order->status){
            if($data["status"] == 3){
                $orderDetails = OrderDetail::where('order_id',$id)->get();
                //dd($orderDetails[0]['total_coupon']);
                foreach ($orderDetails as $key => $orderDetail) {
                    $product = Product::where('id',$orderDetail->product_id)->first();
                    //dd($product);
                    if($product){
                        $product->update(['inventory' => $product->inventory - $orderDetail->qty]);
                    }
                    $productDetail = ProductDetail::where('product_id',$orderDetail->product_id)
                                                    ->where('size',$orderDetail->size)
                                                    ->where('color',$orderDetail->color)
                                                    ->first();
                    if($productDetail){
                        $productDetail->update(['inventory' => $product->inventory - $orderDetail->qty]);
                    }
                    $userOrder = User::where('email',$order->email)->first();
                
                    if($orderDetail->total_coupon != 0){
                        $userOrder->update(['total' => $userOrder->total + $orderDetail->total_coupon]);
                    }else{
                        $userOrder->update(['total' => $userOrder->total + $orderDetail->total]);
                    }
                    $dataStistic = [];
                    $statistic = Statistic::whereDate('order_date',$order->order_date)->first();
                    if($statistic){
                        $dataStistic = [
                            'quantity' => $statistic->quantity + $orderDetail->qty,
                            'profit' => $statistic->profit + 1000,
                            'total_order' => $statistic->total_order + 1,
                        ];
                        if($orderDetail->total_coupon == 0){
                            $dataStistic['sales'] = $statistic->sales + $orderDetail->total;
                        }else{
                            $dataStistic['sales'] = $statistic->sales + $orderDetail->total_coupon;
                        }
                        $statistic->update($dataStistic);
                    }else{
                        $dataStistic = [
                            'order_date' => $order->order_date,
                            'quantity' => $orderDetail->qty,
                            'profit' => 1000,
                            'total_order' => 1,
                        ];
                        if($orderDetail->total_coupon == 0){
                            $dataStistic['sales'] = $orderDetail->total;
                        }else{
                            $dataStistic['sales'] = $orderDetail->total_coupon;
                        }
                        Statistic::create($dataStistic);
                    }
                }
               
               

    
                
                // foreach ($orderDetails as $key => $orderDetail) {
                //     //dd($orderDetail);
                // if($statistic){
                //     if($orderDetail->total_coupon == 0){
                //         $dataStistic = [
                //             'sales' => $statistic->sales + $orderDetail->total,
                //             'quantity' => $statistic->quantity + $orderDetail->qty,
                //             'profit' => $statistic->profit + 1000,
                //             'total_order' => $statistic->total_order + 1,
                //         ];
                //         $statistic->update($dataStistic);

                //     } else {
                //         $dataStistic = [
                //             'sales' => $statistic->sales + $orderDetail->total_coupon ,
                //             'quantity' => $statistic->quantity + $orderDetail->qty,
                //             'profit' => $statistic->profit + 1000,
                //             'total_order' => $statistic->total_order + 1,
                //         ];
                //         $statistic->update($dataStistic);
                //     }

    
                // } else {
                    
                //     if($orderDetail->total_coupon == 0){
                //         $dataStistic = [
                //             'sales' => $orderDetail->total,
                //             'order_date' => $order->order_date,
                //             'quantity' => $orderDetail->qty,
                //             'profit' => 1000,
                //             'total_order' => 1,
                //         ];
                //         Statistic::create($dataStistic);
                        
                //     } else {
                //         $dataStistic = [
                //             'sales' => $orderDetail->total_coupon,
                //             'order_date' => $order->order_date,
                //             'quantity' => $orderDetail->qty,
                //             'profit' => 1000,
                //             'total_order' => 1,
                //         ];
                //         Statistic::create($dataStistic);

                //         }

                //     }
                // }
            }

            $order->update($data);
        }
        
        return redirect('admin/order');
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
        $orders = Order::find($id);
        $orders->delete($id);

        return redirect('admin/order');
    }
}
