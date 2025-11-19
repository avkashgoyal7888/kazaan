<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PayuController extends Controller
{
    public function packages()
    {
        return view("web.package.index");
    }

    public function proceedToPayu(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|min:3|max:100',
            'email'       => 'required|email|max:100',
            'contact'     => 'required|digits:10',
            'amount'      => 'required|numeric|min:1',
            'productinfo' => 'required|string',
        ]);

        try {
            $key  = env('PAYU_MERCHANT_KEY');
            $salt = env('PAYU_SALT');

            if (!$key || !$salt) {
                return response()->json([
                    'success' => false,
                    'message' => 'Payment gateway configuration error.'
                ], 500);
            }

            $txnid = 'TXN' . time() . rand(1000, 9999);
            $productInfo = $validated['productinfo'];
            $amount      = number_format($validated['amount'], 2, '.', '');
            $firstname   = $validated['name'];
            $email       = $validated['email'];
            $phone       = $validated['contact'];

            $surl = route('web.packages.payment.success');
            $furl = route('web.packages.payment.failed');

            $hashString = $key . '|' . $txnid . '|' . $amount . '|' . $productInfo . '|' . $firstname . '|' . $email . '|||||||||||' . $salt;
            $hash = strtolower(hash('sha512', $hashString));

            // $payuUrl = 'https://test.payu.in/_payment';            // For production:
            $payuUrl = 'https://secure.payu.in/_payment';

            session([
                'payu_txnid'   => $txnid,
                'payu_amount'  => $amount,
                'payu_package' => $productInfo
            ]);

            return response()->json([
                'success'     => true,
                'payuUrl'     => $payuUrl,
                'key'         => $key,
                'txnid'       => $txnid,
                'amount'      => $amount,
                'productinfo' => $productInfo,
                'firstname'   => $firstname,
                'email'       => $email,
                'phone'       => $phone,
                'surl'        => $surl,
                'furl'        => $furl,
                'hash'        => $hash
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Payment initialization failed. Please try again.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }


    public function paymentSuccess(Request $request)
    {
        $txnid = $request->txnid;
        $existingTransaction = Payment::where('trans_id', $txnid)->first();
        if (!$existingTransaction) {
            Payment::create([
                'name' => $request->firstname,
                'email' => $request->email,
                'contact' => $request->phone,
                'package' => $request->productinfo,
                'amount' => $request->amount,
                'trans_id' => $txnid,
                'mihpayid' => $request->mihpayid,
                'bank_ref_num' => $request->bank_ref_num,
                'payment_method' => $request->mode,
                'status_description' => $request->field9,
                'status' => $request->status,
            ]);
        }
        return view("web.package.success", ['data' => $request->all()]);
    }

    public function paymentFailed(Request $request)
    {
        $status = $request->status ?? 'failed';
        $txnid = $request->txnid ?? session('payu_txnid');
        $amount = $request->amount ?? session('payu_amount');
        $existingTransaction = Payment::where('trans_id', $txnid)->first();
        if (!$existingTransaction) {
            Payment::create([
                'name' => $request->firstname,
                'email' => $request->email,
                'contact' => $request->phone,
                'package' => $request->productinfo,
                'amount' => $amount,
                'trans_id' => $txnid,
                'mihpayid' => $request->mihpayid,
                'bank_ref_num' => $request->bank_ref_num,
                'payment_method' => $request->mode,
                'status_description' => $request->field9,
                'error_message' => $request->error_Message,
                'status' => $status,
            ]);
        }
        return view("web.package.failed", ['data' => $request->all()]);
    }
}
