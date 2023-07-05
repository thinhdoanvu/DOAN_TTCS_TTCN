<?php

namespace App\Http\Services\Invoices;

use App\Models\Cart;
use App\Models\DetailInvoice;
use App\Models\Invoice;
use App\Models\Member;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InvoiceService
{

    public function createInvoice($nameRecipient, $phoneRecipient, $deliveryAddress, $deliveryDate, $totalAll)
    {
        $member_id = Auth::guard('webuser')->user()->id;
        $cart_details = Cart::where('member_id', $member_id)->get();
        $products = Product::all();

        if ($cart_details->count() > 0) {

            $member = Member::where('id', $member_id)->get();

            $invoice = Invoice::create([
                'nameRecipient' => $nameRecipient,
                'phoneRecipient' => $phoneRecipient,
                'deliveryAddress' => $deliveryAddress,
                'deliveryDate' => $deliveryDate,
                'invoiceStatus' => 1,
                'total' => $totalAll,
            ]);

            foreach ($cart_details as $value) {
                DetailInvoice::create([
                    'invoice_id' => $invoice->id,
                    'member_id' => $member_id,
                    'product_id' => $value->product_id,
                    'price' => $value->price,
                    'amount' => $value->amount,
                    'total' => $value->total,
                ]);

                Product::find($value->product_id)->update([
                    'amount' => DB::raw("amount - $value->amount")
                ]);
            }

            Mail::send('user.page.invoice.invoice', compact('member_id', 'invoice', 'cart_details', 'products'), function ($email) use ($member) {
                $email->subject('NaFruits - Hóa đơn điện tử');
                $email->to(Auth::guard('webuser')->user()->email, Auth::guard('webuser')->user()->full_name);
            });

            Cart::where('member_id', $member_id)->delete();

            return redirect()->route('cart.detail')->with('msg', 'Bạn đã đặt hàng thành công, thông tin hóa đơn đã được gửi qua email');
        }
    }
}
