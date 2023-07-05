<?php

namespace App\Http\Controllers;

use App\Models\Trademark;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trademark = Trademark::orderBy('id', 'ASC')->paginate(5);
        if($key = request()->key)
        {
            $trademark = Trademark::orderBy('id', 'ASC')->where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.product.trademark.index', compact('trademark'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminshop.product.trademark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postcreate(Request $request)
    {
        Trademark::create($request->all());

        return redirect()->route('adminshop.trademark.index')->with('msg', 'Thêm thương hiệu thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Trademark::find($id);
        return view('adminshop.product.trademark.edit', compact('result'));
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
        Trademark::find($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('adminshop.trademark.index')->with('msg', 'Cập nhật thương hiệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Trademark::find($id)->delete();
        return redirect()->route('adminshop.trademark.index')->with('msg', 'Xóa thương hiệu thành công');
    }
}
