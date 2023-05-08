<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Addtocart;
use App\Models\Category;
use App\Models\Items;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Omnipay\Common\Item;

class menuController extends Controller
{
  public function index(Request $req, $id, $catid = null)
  {

    $vendor_id = Table::where('id', $id)->pluck('rest_id');
    if ($req->ajax()) {
      $menudata = Items::where('vendor_id', '=', $vendor_id[0])
      ->where('type', '=', $catid)
      ->where('status','=',1)
      ->get();
      return response()->json([
        'menudata' => $menudata,
      ], 200);
    } else{
    
      
      $menudata = Items::where('vendor_id', $vendor_id[0])
      ->where('status',1)
      ->get();

      // dd($menudata);
      // // $menudata = Items::where('vendor_id', $vendor_id[0])
      // // ->orWhere('status',1)
      // // ->get();
    }
   
    
    $count = Addtocart::where('table_id', $id)->count();
    $category = Category::get();

    $clientIP = \Request::ip();
    $mycart = Addtocart::where('user_id', $clientIP)->pluck('item_id');


    $NewArray = array();
    foreach ($mycart as $item) {
      array_push($NewArray, $item);
    }
    $mycart = $NewArray;



    return view('frontend.menu', compact('menudata', 'category', 'id', 'count', 'mycart'));
  }

  public function searchitem(Request $req)
  {


    $vendor_id = Table::where('id', $req['id'])->pluck('rest_id');
    if ($req->ajax()) {
      $menudata = Items::where('vendor_id', '=', $vendor_id[0])
      ->where('status',1)
      ->where('title', 'like', '%' . $req['query'] . '%')
        ->get();

      $total_rows = $menudata->count();
      $output = '';

      $clientIP = \Request::ip();
      $mycart = Addtocart::where('user_id', $clientIP)->pluck('item_id');

      $NewArray = array();
      foreach ($mycart as $item) {
        array_push($NewArray, $item);
      }
      $mycart = $NewArray;
      if ($total_rows > 0) {
        foreach ($menudata as $row) {
          if (in_array($row->id, $mycart)) {
            $output .= '
                      <div class="col-lg-3 col-md-4 col-sm-6">
                      <div class="cs-card mb-5 cs-product-card">
                      <img  class="card-image" src="http://127.0.0.1:8000/storage/' . $row->image . '" />
                       <div class="cs-card-content clearfix">
                                    <div class="pull-left">
                                        <h4 title="Margherita ">' . $row->title . '</h4>
                                        <p>$' . $row->price . '</p>
                                    </div>
                                    <div class="pull-right">
                                        <form id="item_form_856766">
                                            <input type="hidden" id="itemFrom856766" value="items">
                                            <input type="hidden" id="selected_item_id856766" value="856766">
                                            <input type="hidden" id="selected_menu_id856766" value="21">
                                            <input type="hidden" id="selected_item_cost856766" value="200.00">
                                        </form>
                                        <a onclick="addtocart(' . $row->id . ')" class="btn  btn-sm btn-round  added-cart">Added to cart</a>
                                    </div>
                                </div>
                   
                    
                 
                </div></div>';
          } else {
            $output .= '
  <div class="col-lg-3 col-md-4 col-sm-6">
  <div class="cs-card mb-5 cs-product-card">
  <img  class="card-image" src="http://127.0.0.1:8000/storage/' . $row->image . '" />
   <div class="cs-card-content clearfix">
                <div class="pull-left">
                    <h4 title="Margherita ">' . $row->title . '</h4>
                    <p>$' . $row->price . '</p>
                </div>
                <div class="pull-right">
                    <form id="item_form_856766">
                        <input type="hidden" id="itemFrom856766" value="items">
                        <input type="hidden" id="selected_item_id856766" value="856766">
                        <input type="hidden" id="selected_menu_id856766" value="21">
                        <input type="hidden" id="selected_item_cost856766" value="200.00">
                    </form>
                    <a onclick="addtocart(' . $row->id . ')" class="btn btn-sm   btn-round  btn-primary card-btn">Add to cart</a>
                </div>
            </div>



</div></div>';
          }
        }
      } else {
        $output .= '<p>
                No data Found
                </p>';
      }



      return response()->json([
        'mycart' => $mycart,
        'menudata' => $output,
        'query' => $req['query'],
        'count' => $total_rows
      ], 200);
    }
  }
  public function addtocart(Request $req)
  {
    $clientIP = \Request::ip();
    $item = Addtocart::where('item_id', '=', $req->item_id)->where('table_id', '=', $req->table_id)->first();
    if (empty($item)) {
      Addtocart::create(['item_id' => $req->item_id, 'table_id' => $req->table_id, 'qty' => 1, 'status' => 0, 'user_id' => $clientIP]);
      $count = Addtocart::where('table_id', $req->table_id)->count();
      $mycart = Addtocart::where('user_id', $clientIP)->get();
      return response()->json([
        'mycart' => $mycart,
        'success' => "success",
        'count' => $count,
      ], 200);
    } else {
      return response()->json([

        'success' => "fail",

      ], 200);
    }
  }

  public function mycart($id)
  {


    $cart = Addtocart::with('itemDetail')->get();

    $totalprice = null;
    foreach ($cart as $p) {
      $totalprice = $totalprice + $p->itemDetail->price * $p->qty;
    }
    $count = Addtocart::where('table_id', $id)->count();

    return view('frontend.myorder', compact('cart', 'totalprice', 'count'));
  }

  public function checkout()
  {

    dd("indise gf");
  }

  public function removeitem(Request $req)
  {

    $item = Addtocart::where('item_id', $req->item_id)->where('table_id', $req->table_id)->delete();
    $count = Addtocart::count();
    return response()->json([
      'success' => "item deleted successfully",
      'count' => $count,
    ], 200);
  }

  public function changeqty(Request $req)
  {



    $obj = Addtocart::where('id', '=', $req->item_id)->where('table_id', '=', $req->table_id)->update(['qty' => $req->qty]);
    $grandTotal = 0;


    $item = Addtocart::with('itemDetail')->where('table_id', '=', $req->table_id)->get();
    foreach ($item as $p) {
      $grandTotal = $grandTotal + $p->itemDetail->price * $p->qty;
    }

    return response()->json([
      'obj' => $item,
      'item_id' => $req->item_id,
      'grand_total' => $grandTotal,
    ], 200);
  }

  public function searchinAdd(Request $request)
  {

    $id = $request->table_id;
    $vendor_id = Table::where('id', $request->table_id)->pluck('rest_id');

    if ($request->search_item) {
      $menudata = Items::where([['title', 'like', $request->search_item], ['vendor_id', '=', $vendor_id[0]]])->get();
    } else {
      $menudata = Items::where('vendor_id', $vendor_id[0])->get();
    }
    $count = Addtocart::where('table_id', $request->table_id)->count();
    $category = Category::get();


    return view('frontend.menu', compact('menudata', 'category', 'id', 'count'));
  }

  public function orderStatus($userid)
  {
    Addtocart::where('user_id', $userid)->delete();
    $orders = Order::with('order_detail.item_details')->where('user_id', $userid)->get();
    $NewArray = array();
    for ($i = 0; $i < count($orders); $i++) {


      if (count($orders[$i]->order_detail) > 1) {

        for ($j = 0; $j < count($orders[$i]->order_detail); $j++) {

          $orders[$i]->order_detail[$j]->table_number = $orders[$i]->table_id;
          $orders[$i]->order_detail[$j]->payment_id = $orders[$i]->payment_id;
         
         array_push($NewArray, $orders[$i]->order_detail[$j]);
        
        }
      }
              
        else{
          $orders[$i]['table_number'] = $orders[$i]->table_id;
          $orders[$i]['payment_id'] =$orders[$i]->id;
          $data = Items::where('id',$orders[$i]->order_detail[0]->item_id)->get();
          $orders[$i]['item_name'] = $data[0]->title;
          $orders[$i]['image'] = $data[0]->image;
          $orders[$i]['qty'] = $orders[$i]->order_detail[0]->qty;
          array_push($NewArray,$orders[$i]);
        
     
   }
    }

 
    $orderdata = $NewArray;

    return view('frontend.orderstatus', compact('orderdata'));
  }
}
