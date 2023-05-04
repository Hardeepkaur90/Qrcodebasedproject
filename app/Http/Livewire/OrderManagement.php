<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\order_details;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderManagement extends Component
{
    public function render()
    {
      $NewArray = array();

     
         if(Auth::user()->role == 7){
        //   $orders = Order::with('order_details.item_details')->where('rest_id', Auth::user()->company_id)->where('status','!=',2)->paginate(6);
             $orders = Order::with('order_detail')->where('rest_id', Auth::user()->company_id)->paginate(6);
         
          }else{

         
            // $orders = Order::with('order_details.item_details')->where('rest_id', Auth::user()->id)->where('status','!=',2)->paginate(6);
             $orders = Order::with('order_detail')->where('rest_id', Auth::user()->id)->where('status','!=',2)->paginate(6);
            
         }
        for($i=0; $i<count($orders); $i++){
           if(count($orders[$i]->order_detail) >1){
                for($j=0; $j < count($orders[$i]->order_detail) ; $j++ ){
                  $orders[$i]->order_detail[$j]->table_number = $orders[$i]->table_id;
                  $orders[$i]->order_detail[$j]->payment_id = $orders[$i]->payment_id;
                  $orders[$i]->order_detail[$j]->image = $orders[$i]->order_detail[$j]->item_details->image;
                  $array =  (array) $orders[$i]->order_detail[$j];
                     array_push($NewArray,$orders[$i]->order_detail[$j]);
                 }
             }
        } 
       $orders  = $NewArray;
      return view('livewire.order-management',compact('orders'));
     }
    
   public function change($id,$item_id,$val,$order_id)
    {
         order_details::where('id','=', $id)->where('item_id','=',$item_id)->where('order_id','=',$order_id)
          ->update([
              'status' => $val
            ]);
        
    }
    public function delete($id){
      $user = Order::find($id);
      $user->delete();
      session()->flash('message', 'Order deleted successfully');
      
    }
}
