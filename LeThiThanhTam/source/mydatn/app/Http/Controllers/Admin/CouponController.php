<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Rank;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coupons = Coupon::all();
        $coupons = Coupon::paginate(5);

        $now = Carbon::now();
        $today = $now->format('Y/m/d');
        if($search = request()->search){
            //lấy danh sách theo từ khóa tìm kiếm
            $coupons = Coupon::where('name','like','%' . $search . '%')->paginate(5);
        }
    

        return view('admin.coupon.index', compact('coupons','today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ranks = Rank::all();
        return view('admin.coupon.create', compact('ranks'));
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
        $data = $request->all();
        $coupons = Coupon::create($data);
        
        return redirect('admin/coupon');
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
        $coupon = Coupon::find($id);
        $ranks = Rank::all();
        return view('admin.coupon.edit', compact('coupon', 'ranks'));
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
        $data = $request->all();
        $coupon = Coupon::find($id);
        $coupon->update($data);
        return redirect('admin/coupon');
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
        $coupons = Coupon::find($id);
        $coupons->delete($id);

        return redirect('admin/coupon');
    }
}
