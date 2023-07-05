<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::orderBy('id', 'ASC')->paginate(5);
        if($key = request()->key)
        {
            $unit = Unit::orderBy('id', 'ASC')->where('type','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.product.unit.index', compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminshop.product.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postcreate(Request $request)
    {
        Unit::create([
            'type' => $request->type,
        ]);

        return redirect()->route('adminshop.unit.index')->with('msg', 'Thêm đơn vị tính thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Unit::find($id);
        return view('adminshop.product.unit.edit', compact('result'));
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
        Unit::find($id)->update([
            'type' => $request->type,
        ]);

        return redirect()->route('adminshop.unit.index')->with('msg', 'Cập nhật đơn vị tính thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Unit::find($id)->delete();
        return redirect()->route('adminshop.unit.index')->with('msg', 'Xóa đơn vị tính thành công');
    }
}
