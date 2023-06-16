<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $now = Carbon::now();
        $today = $now->format('Y-m-d');
        $month = $now->month;
        $year = $now->year;
        $idsBestSeller = OrderDetail::selectRaw('order_details.product_id,SUM(order_details.qty) as amount')
        ->leftJoin('products','products.id','order_details.product_id')
        ->groupBy('order_details.product_id')
        ->orderBy('amount','desc')
        ->limit(1)->pluck('order_details.product_id')->toArray();

        $bestSellerProducts = Product::whereIn('id',$idsBestSeller )->first();

        $tongNam = OrderDetail::selectRaw('SUM(total) as tong')
                                ->whereYear('created_at',$year)->first();
                           //dd($tongNam->tong);

        $tongThang = OrderDetail::selectRaw('SUM(total) as tong')
                                ->whereMonth('created_at',$month)->first();
                                
        $tongNgay = OrderDetail::selectRaw(' SUM(total) as tong')
                                ->whereDate('created_at',$today)->first();
        
        

        $tongDHang = Order::selectRaw('COUNT(id) as tong')
                            ->whereMonth('created_at',$month)->first();

        $product_views = Product::orderBy('product_view','DESC')->take(10)->get();
        $blog_views = Blog::orderBy('blog_view','DESC')->take(10)->get();
        return view('admin.dashboard.index',compact('tongNam','bestSellerProducts','tongThang','tongDHang','tongNgay','product_views','blog_views'));

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
    }

    public function filter_by_date(Request $request)
    {
        if($request->ajax()){
            
            $data = $request->all();
            $from_date = $data['from_date'];
            $to_date = $data['to_date'];
            $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
            foreach($get as $key => $val){
                $chart_data[] = array(
                    'period' => $val->order_date,
                    'order' => $val->total_order,
                    'sales' => $val->sales,
                    'profit' => $val->profit,
                    'quantity' => $val->quantity
                );
            }
            echo $data = json_encode($chart_data);

        }
    }

    public function days_order(Request $request)
    {
        if($request->ajax()){
            
            $now = Carbon::now();
            $today = $now->format('Y-m-d');
            $sub30days = $now->subdays(30)->toDateString();

            $get = Statistic::whereBetween('order_date',[$sub30days,$today])->orderBy('order_date','ASC')->get();
            foreach($get as $key => $val){
                $chart_data[] = array(
                    'period' => $val->order_date,
                    'order' => $val->total_order,
                    'sales' => $val->sales,
                    'profit' => $val->profit,
                    'quantity' => $val->quantity
                );
            }
            echo $data = json_encode($chart_data);

        }
    }

    public function dashboard_filter(Request $request)
    {
        if($request->ajax()){
            
            $data = $request->all();
            $now = Carbon::now();
            $today = $now->format('Y-m-d');
            $dau_thangnay = $now->startOfMonth()->toDateString();
            $dau_thangtruoc = $now->subMonth()->startOfMonth()->toDateString();
            //dd($dau_thangtruoc);
            $cuoi_thangtruoc = $now->endOfMonth()->toDateString();
            $sub7days = date('Y-m-d', strtotime('-7 days', strtotime($today)));
            $sub365days = $now->subdays(365)->toDateString();
            $chart_data = [];
            if($data['dashboard_value'] == '7ngay'){
                $get = Statistic::whereBetween('order_date',[$sub7days,$today])->orderBy('order_date','ASC')->get();
            } elseif($data['dashboard_value'] == 'thangtruoc'){
                $get = Statistic::whereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();
            } elseif($data['dashboard_value'] == 'thangnay'){
                $get = Statistic::whereBetween('order_date',[$dau_thangnay,$today])->orderBy('order_date','ASC')->get();
            } else {
                $get = Statistic::whereBetween('order_date',[$sub365days,$today])->orderBy('order_date','ASC')->get();
            }
            if($get){
                foreach($get as $key => $val){
                    $chart_data[] = array(
                        'period' => $val->order_date,
                        'order' => $val->total_order,
                        'sales' => $val->sales,
                        'profit' => $val->profit,
                        'quantity' => $val->quantity
                    );
                }
            }
            
            echo $data = json_encode($chart_data);

        }
    }
}
