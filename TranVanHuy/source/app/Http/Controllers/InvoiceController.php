<?php

namespace App\Http\Controllers;

use App\Http\Services\Invoices\InvoiceService;
use App\Models\Cart;
use App\Models\DetailInvoice;
use Illuminate\Http\Request;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    protected $invoices;

    public function __construct(InvoiceService $invoices)
    {
        $this->invoices = $invoices;
    }

    public function index()
    {
        $invoices = Invoice::orderBy('id', 'DESC')->paginate(5);
        return view('adminshop.invoice.index', compact('invoices'));
    }

    public function create(Request $request)
    {
        $invoiceCart = $this->invoices->createInvoice(
            $request->nameRecipient,
            $request->phoneRecipient,
            $request->deliveryAddress,
            $request->deliveryDate,
            $request->totalAll);
        return $invoiceCart;
    }

    public function changeStatus(Request $request)
    {
        Invoice::find($request->id_invoice)->update([
            'invoiceStatus' => $request->invoiceStatus
        ]);
    }

    public function detail($id){

        $detail_invoices = DetailInvoice::where('invoice_id', $id)->orderBy('id', 'ASC')->paginate(5);
        $invoices = Invoice::where('id', $id)->get();
        $products = Product::all();
        return view('adminshop.invoice.detail', compact('detail_invoices', 'invoices', 'products'));
    }

    public function delete($id)
    {
        Invoice::find($id)->delete();
        return redirect()->route('adminshop.invoice.index')->with('msg', 'Xóa hóa đơn thành công');
    }
}
