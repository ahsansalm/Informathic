<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Credit;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Auth;
class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        

        
        try {

            $response = $this->gateway->purchase(array(
          
                'amount' => $request->amount,
                'credits' => $request->credits,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
       
    }

    public function success(Request $request)
    
    {
       
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
                'credits' => $request->input('credits'),
            ));

            $response = $transaction->send();

        if ($response->isSuccessful()) {
                
       

                $arr = $response->getData();
                $id = Auth::user()->id;
                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->user_id = $id;
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->save();

                Credit::insert([
                    'user_id' => $id,
                    'credits' => $request->credits,
                ]);


                $notification = array(
                    'message' => 'Payment is Successfull.',
                    'alert_type' => 'success'
                );
                return Redirect('/SupportWallet')->with( $notification);



            }
            else{
                return $response->getMessage();
            }
        }
        else{
            $notification = array(
                'message' => 'Payment cancel.',
                'alert_type' => 'error'
            );
            return Redirect('/SupportWallet')->with($notification);
        }
    }

    public function error()
    {
        $notification = array(
                'message' => 'User decline the payment.',
                'alert_type' => 'error'
            );
            return Redirect('/SupportWallet')->with($notification);
        }
}

