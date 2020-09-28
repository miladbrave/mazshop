<?php

namespace App\Http\Controllers\front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Pay;
use App\Product;
use App\Purchlist;
use App\Userlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PayController extends Controller
{
    public function pay()
    {
        $mount = Userlist::where('user_id', auth()->user()->id)->latest('created_at')->first();
        $total = $mount->totalprice + $mount->receiveprice;

        $invoice = (new Invoice)->amount((int)$total);
        $invoice->detail(['TestPay' => 'This is a test']);
        $payment = Payment::callbackUrl(route('paypack_callback'))->purchase($invoice);
        $pay = new Pay();
        $pay->transaction_id = $invoice->getTransactionId();
        $pay->price = $invoice->getAmount();
        $pay->user_id = auth()->user()->id;
        $pay->save();
        return $payment->pay()->render();
    }


    public function paypack_callback(Request $request)  //موفق یا ناموفق
    {
        try {
            $pay = Pay::where('transaction_id', $request->trackId)->latest()->first();
            if ($pay) {
                $price = (int)$pay->price;
//                $transaction_id = str_pad($pay->transaction_id, 36, 0, STR_PAD_LEFT);
                $payment = Payment::amount($price)->transactionId($pay->transaction_id)->verify();
                if ($request->success == 1) {
                    $pay->status = 'success';
                    $pay->payment_date = Carbon::now();
                    $pay->order_id = $request->orderId;
                    $pay->save();
                }
            }
            return redirect()->route('payStatus')->with('success', 'پرداخت موفقیت آمیز');

        } catch (InvalidPaymentException $exception) {
            $pay->status = 'failed';
            $pay->save();
            return redirect()->route('payStatus')->with('error', $exception->getMessage());
        }
    }

    public function payStatus()
    {
        $navcategories = Category::where('type', 'null')->get();
        $maincategories = Category::where('type', '!=', 'null')->get();
        $subcategories = Category::whereRaw("type REGEXP '^[0-9]'")->get();
        $pays = Pay::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->first();
        if ($pays->status == 'success') {
            $userlist = Userlist::where('user_id', $pays->user_id)->latest('created_at')->first();
            $purchlist = Purchlist::where('factor_number', $userlist->id)->get();
            foreach ($purchlist as $pro) {
                $product = Product::where('id', $pro->product_id)->first();
                $product->count = $product->count - $pro->count;
                $product->save();
                }
            Session::forget('cart');
            $userlist->status = "success";
            $userlist->save();
        }
        return view('front.callback', compact('success', 'error', 'pays', 'navcategories', 'maincategories', 'subcategories'));
    }

}
