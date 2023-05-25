<?php

namespace App\Http\Livewire;

use App\Models\Items;
use Livewire\Component;
use App\Models\order_details;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderManagement extends Component
{
  public function render()
  {
    $NewArray = array();


    if (Auth::user()->role == 7) {

  
      $orders = Order::with('order_detail')->where('rest_id', Auth::user()->company_id)->get();
     

      for ($i = 0; $i < count($orders); $i++) {

        if (count($orders[$i]->order_detail) > 1) {

          for ($j = 0; $j < count($orders[$i]->order_detail); $j++) {
            if ($orders[$i]->order_detail[$j]->payment_status != 1) {
              $orders[$i]->order_detail[$j]->table_number = $orders[$i]->table_id;
              $orders[$i]->order_detail[$j]->payment_id = $orders[$i]->payment_id;
              $orders[$i]->order_detail[$j]->reminder_note = $orders[$i]->reminder_note;
              $orders[$i]->order_detail[$j]->image = $orders[$i]->order_detail[$j]->item_details->image;
              array_push($NewArray, $orders[$i]->order_detail[$j]);
            }
          }
        } else {
          $orders[$i]['table_number'] = $orders[$i]->table_id;
          $orders[$i]['order_id'] = $orders[$i]->id;
          $orders[$i]['payment_id'] = $orders[$i]->id;
          $data = Items::where('id', $orders[$i]->order_detail[0]->item_id)->get();
          $orders[$i]['item_name'] = $data[0]->title;
          $orders[$i]['image'] = $data[0]->image;
          array_push($NewArray, $orders[$i]);
        }
      }

  
      $order  = $NewArray;
      return view('livewire.order-management', compact('order'));
    } else{

      
      $orders = Order::with('order_detail')->where('rest_id', Auth::user()->id)->where('payment_status', null)->get();
      $order  = $orders;
    }




    return view('livewire.order-management', compact('order'));
  }

  public function change($id, $item_id, $val, $order_id)
  {
    order_details::where('id', '=', $id)->where('item_id', '=', $item_id)->where('order_id', '=', $order_id)
      ->update([
        'status' => $val
      ]);
  }
  public function delete($id)
  {

// $user = order_details::find($id);
$user = Order::find($id);

    if ($user) {
      $user->delete();
      session()->flash('message', 'Order deleted successfully');
    }
    session()->flash('message', 'Order not found');
  }
}
