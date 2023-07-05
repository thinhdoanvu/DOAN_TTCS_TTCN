<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;


class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::orderBy('id', 'ASC')->paginate(5);
        if($key = request()->key)
        {
            $supplier = Supplier::orderBy('id', 'ASC')->where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('adminshop.product.supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('adminshop.product.supplier.create');
    }

    public function postcreate(Request $request)
    {
        $data = $request->all();
        $supplier = Supplier::create($data);

        return redirect()->route('adminshop.supplier.index')->with('msg', 'Thêm nhà cung cấp thành công');
    }

    public function edit($id)
    {
        $result = Supplier::find($id);
        return view('adminshop.product.supplier.edit', compact('result'));
    }

    public function updateSupplier(Request $request, $id)
    {
        Supplier::find($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('adminshop.supplier.index')->with('msg', 'Cập nhật nhà cung cấp thành công');
    }

    public function delete($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('adminshop.supplier.index')->with('msg', 'Xóa nhà cung cấp thành công');
    }
}
