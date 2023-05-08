<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Addtocart;
use App\Models\Payment;
use App\Models\Order;
use App\Models\order_details;
use App\Models\Table;
use App\Models\Items;
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
             Session::put('table_id', $request->table_id);
          try {
              $response = $this->gateway->purchase(array(
                
                 'amount' => $request->value,
                 'currency' => env('PAYPAL_CURRENCY'),
                 'returnUrl' => url('success'),
                 'cancelUrl' => url('failed'),  
                 'table_id'=>$request->table_id,
                ))->send();
             if ($response->isRedirect()) {
                     
             //   $delete = Addtocart::where('table_id',$request->table_id)->delete();
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
                 $payment->payment_id = $arr['id'];
                 $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                 $payment->payer_email = $arr['payer']['payer_info']['email'];
                 $payment->amount = $arr['transactions'][0]['amount']['total'];
                 $payment->currency = env('PAYPAL_CURRENCY');
                 $payment->payment_status = $arr['state'];
                 $payment->save();
                    
                 //Creating Orders entry in orders table  
                 
                 $table_id = Table::where('id',session('table_id'))->pluck('rest_id');
                 $clientIP = \Request::ip(); 
                  //adding order in order's table
                 $order = new Order();  
                 $order->user_id =  $clientIP;
                 $order->status = '0';
                 $order->total_price = $arr['transactions'][0]['amount']['total'];
                 $order->discount ='0';
                 $order->rest_id =$table_id[0];
                 $order->payment_mode =  "online";
                 $order->table_id = session('table_id');
                 $order->payment_id = $arr['id'];
                 $order->save();
                 
                 // adding order in order_details table entry
                  $items = Addtocart::where('table_id',session('table_id'))->get();
                  foreach ($items as $value) {
                     
                    $itemdata = Items::where('id',$value->item_id)->get();
                    
                    $itemdata1 = Addtocart::where('user_id',$clientIP )->update([
                      'status'=>1 
                       ]);
                      
                  
                     $order_detail = new order_details();
                     
                          $order_detail->user_id =  $clientIP;
                          $order_detail->order_id = $order->id;
                          $order_detail->item_id = $value->item_id;
                          $order_detail->table_id = session('table_id');
                          $order_detail->item_name =$itemdata['0']->title;
                          $order_detail->status = 0;
                          $order_detail->qty = $value->qty;
                          $order_detail->save();
                     }
                     
                
                     
                         return redirect('your-order/'.$clientIP);
                     // return redirect(url('your-order'));
                     // return view('frontend.orderstatus',compact('orderdata'));
                 //   return "Payment is Successfull.Your Transaction Id is :".$arr['id'];
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

     public function paycash(Request $req){
     

         $clientIP = \Request::ip(); 

         $rest_id = Table::where('id',$req->table_id)->pluck('rest_id');

         //insert offline order in orders table
         $order = new Order();  
         $order->user_id =  $clientIP;
         $order->status = '0';
         $order->total_price = $req->value;
         $order->discount ='0';
         $order->rest_id = $rest_id[0];
         $order->payment_mode =  "offline";
         $order->table_id = $req->table_id;
         $order->save();

          //insert offline order in orders detail table
          $items = Addtocart::where('table_id',$req->table_id)->get();
          $order_detail = new order_details();


          foreach ($items as $value) {
                     
            $itemdata = Items::where('id',$value->item_id)->get();
            
            $itemdata1 = Addtocart::where('user_id',$clientIP )->update([
              'status'=>1 
               ]);
              
          
             $order_detail = new order_details();
             
                  $order_detail->user_id =  $clientIP;
                  $order_detail->order_id = $order->id;
                  $order_detail->item_id = $value->item_id;
                  $order_detail->table_id = $req->table_id;
                  $order_detail->item_name =$itemdata['0']->title;
                  $order_detail->status = 0;
                  $order_detail->qty = $value->qty;
                  $order_detail->save();
             }
             
        
             
                 return redirect('your-order/'.$clientIP);
                     
      

     }
     
}
