<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Addtocart;
use App\Models\Category;
use App\Models\Items;
use Illuminate\Support\Arr;
use App\Models\Order;
use App\Models\order_details;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Omnipay\Common\Item;

class menuController extends Controller
{
  public function index(Request $req, $v_id, $id, $catid = null)
  {
    $id = (int)explode("=", $id)[1];
    $v_id = (int)explode("=", $v_id)[1];
    $cartitems = Addtocart::where('table_id', $id)->pluck('item_id');
    $vendorData = User::where('id', $v_id)->get();
    if ($req->ajax()) {
      if ($catid) {
        $menudata = Items::with('category:id,status')->where('vendor_id', (int)$v_id)->where('status', 1)->where('type', $catid)->get();
      } else {
        $menudata = Items::with('category:id,status')->where('vendor_id', (int)$v_id)->where('status', 1)->get();
      }
      foreach ($menudata as $index => $d1) {
        if ($d1->category->status == "0") {
          unset($menudata[$index]);
        }
      }
      return response()->json([
        'menudata' => $menudata,
        'addtocart' => $cartitems,
      ], 200);
    } else {
      $menudata = Items::with('category:id,status')->where('vendor_id', (int)$v_id)->where('status', 1)->get();
      foreach ($menudata as $index => $d1) {
        if ($d1->category->status == "0") {
          unset($menudata[$index]);
        }
      }
    }
    $count = Addtocart::where('table_id', $id)->count();
    $category = Category::where('status', 1)->get();

    $clientIP = \Request::ip();
    $mycart = Addtocart::where('user_id', $clientIP)->pluck('item_id');
    $NewArray = array();
    foreach ($mycart as $item) {
      array_push($NewArray, $item);
    }
    $mycart = $NewArray;
    return view('frontend.menu', compact('menudata', 'category', 'id', 'count', 'mycart', 'vendorData', 'cartitems',));
  }




  public function searchitem(Request $req)
  {
    if ($req->ajax()) {
      $menudata = Items::where('vendor_id', '=', (int)$req['v_id'])
        ->where('status', 1)
        ->where('title', 'like', '%' . $req['query'] . '%')
        ->get();

      foreach ($menudata as $index => $d1) {
        if ($d1->category->status == "0") {
          unset($menudata[$index]);
        }
      }

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
    if ($req->ajax()) {
      $item = Addtocart::where('item_id', '=', $req->item_id)->where('table_id', '=', $req->table_id)->first();
      if (empty($item)) {
        Addtocart::create(['item_id' => $req->item_id, 'table_id' => $req->table_id, 'qty' => 1, 'status' => 0, 'user_id' => $clientIP, 'rest_id' => $req->v_id]);

        $count = Addtocart::where('table_id', $req->table_id)->count();
        $mycart = Addtocart::where('user_id', $clientIP)->pluck('item_id');
        $menudata = Items::with('category:id,status')->where('vendor_id', $req->v_id)
          ->where('status', 1)
          ->get();
        foreach ($menudata as $index => $d1) {
          if ($d1->category->status == "0") {
            unset($menudata[$index]);
          }
        }


        $total_rows = $menudata->count();
        $output = '';
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

          return response()->json([
            'mycart' => $mycart,
            'success' => "success",
            'menudata' => $output,
            'count' => $count,
          ], 200);
        } else {
          $output .= '<p>
                  No data Found
                  </p>';
        }
      } else {
        return response()->json([

          'success' => "fail",

        ], 200);
      }
    }
  }

  public function mycart($v_id, $id)
  {


    $v_id = (int)explode("=", $v_id)[1];
    $id = (int)explode("=", $id)[1];

    $cart = Addtocart::with('itemDetail')->where('rest_id', '=', $v_id)->get();
    $totalprice = null;
    foreach ($cart as $p) {
      $totalprice = $totalprice + $p->itemDetail->price * $p->qty;
    }

    $count = Addtocart::where('table_id', $id)->where('rest_id', '=', $v_id)->count();


    return view('frontend.myorder', compact('cart', 'totalprice', 'count', 'v_id'));
  }


  public function removeitem(Request $req)
  {


    $item = Addtocart::where('item_id', $req->item_id)->where('table_id', $req->table_id)->delete();

    $count = Addtocart::count();
    $cart = Addtocart::with('itemDetail')->where('rest_id', '=', $req->v_id)->get();
    return response()->json([
      'success' => "item deleted successfully",
      'count' => $count,
      'cart' => $cart,
    ], 200);
  }

  public function changeqty(Request $req)
  {
    $table_id = (int)explode("=", $req->table_id)[1];


    $obj = Addtocart::where('id', '=', $req->item_id)->where('table_id', '=', $table_id)->update(['qty' => $req->qty]);
    $grandTotal = 0;


    $item = Addtocart::with('itemDetail')->where('table_id', '=', $table_id)->get();
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

    $orders_data = order_details::where('user_id', $userid)->where('orderReceived', null)->get();
    $orderdata =  $orders_data;
    return view('frontend.orderstatus', compact('orderdata'));
  }


  public function completeorder(Request $req)
  {
    $updated = order_details::where('id', $req->order_id)->update(['orderReceived' => 1]);
    return response()->json([
      $updated
    ], 200);
  }
}
