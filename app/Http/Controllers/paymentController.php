<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Addtocart;
use App\Models\Payment;
use App\Models\Order;
use Omnipay\Omnipay;
use Illuminate\Http\Request;
use Session;


class paymentController extends Controller
{

    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setToken("A21AAK45pU2nNDTFZ8Gf5kkqGy47w2JL018c66WWMhnaYGATstZeJC4mrsyx2NfHg9zMzriqHX3zf9gLQNAE0c8LR8996rlCg");
        $this->gateway->setTestMode(true); //set it to 'false' when go live
     }


    public function charge(Request $request)
    {

  
         try {
             $response = $this->gateway->purchase(array(
                'table_id'=>$request->table_id,
                'amount' => $request->value,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('failed'),

              ))->send();
            if ($response->isRedirect()) {
                 dd("inside if");
                Order::craete([]);
                
                Addtocart::where('table_id',$request->id)->delete();
                
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
           
            return $th->getMessage();
        }
      
    }
    public function success(Request $req){
         if($req->paymentId && $req->PayerID){
             $transaction=$this->gateway->completePurchase(array(
                   'payer_id'=>$req->PayerID,
                   'transactionReference'=>$req->paymentId,
                  ));
                  $response = $transaction->send();

                  if($response->isSuccessful()){
                        $arr = $response->getData();
                        $payment = new Payment();
                        $payment->payment_id =$arr['id'];
                        $payment->payer_id =$arr['payer']['payer_info']['payer_id'];
                        $payment->payer_email =$arr['payer']['payer_info']['email'];
                        $payment->amount =$arr['transactions']['0']['amount']['total'];
                        $payment->currency =env('PAYPAL_CURRENCY');
                        $payment->status =$arr['state'];
                        $payment->save();
                        return "Payment is Successfull.Your Transaction Id is :".$arr['id'];
                  }

                  else{
                    return $response->getMessage();
                  }
         }
         else{
            return "Payment Declined !";
         }
    }

    public function error(){
        return "User Declied the payment!";
    }
}
