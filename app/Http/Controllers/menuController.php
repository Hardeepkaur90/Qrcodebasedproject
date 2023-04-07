<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Addtocart;
use App\Models\Category;
use App\Models\Items;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Omnipay\Common\Item;

class menuController extends Controller
{
   public function index($id){
 

       $vendor_id = Table::where('id',$id)->pluck('rest_id');
      
        $menudata=Items::where('vendor_id',$vendor_id[0])->get();
        $count=Addtocart::where('table_id',$id)->count();
        $category=Category::get();
   
       
       return view('frontend.menu',compact('menudata','category','id','count')); 
      
    }

    public function addtocart(Request $req){

     Addtocart::create(['item_id'=>$req->item_id,'table_id'=>$req->table_id,'qty'=>1]);
     $count=Addtocart::where('table_id',$req->table_id)->count();
    
        return response()->json(['success' => "item Added successfully",
        'count' => $count,
    ], 200);
    }

    public function mycart($id){
        $cart=Addtocart::with('itemDetail')->get();

        $totalprice = null;
          foreach ($cart as $p) {
            $totalprice =$totalprice+$p->itemDetail->price*$p->qty;
          }
      $count=Addtocart::where('table_id',$id)->count();
       
        return view('frontend.myorder',compact('cart','totalprice','count'));
    }

    public function checkout(){

        dd("indise gf");
    }

    public function removeitem(Request $req){

      $item = Addtocart::where('item_id',$req->item_id)->where('table_id',$req->table_id)->delete();
           $count=Addtocart::count();
        return response()->json(['success' => "item deleted successfully",
        'count' => $count,
    ], 200);

    }

    public function changeqty(Request $req){

       
             $obj=Addtocart::where('item_id','=',$req->item_id)->where('table_id','=',$req->table_id)->first();
             Addtocart::where('item_id',$req->item_id)->where('table_id','=',$req->table_id)->update(['qty'=>$req->qty]);
              
             $grandTotal= 0;


             $item = Addtocart::with('itemDetail')->where('table_id','=',$req->table_id)->get();  
             foreach ($item as $p) {
              $grandTotal = $grandTotal + $p->itemDetail->price*$p->qty;
            }

            return response()->json([
                'obj' =>$item,
                'item_id' => $req->item_id,
                'grand_total'=>$grandTotal,
            ], 200);
        
    }

    public function searchinAdd(Request $request){

       $id= $request->table_id;
        $vendor_id = Table::where('id',$request->table_id)->pluck('rest_id');

     if($request->search_item){
        $menudata =Items::where([['title','like',$request->search_item], ['vendor_id','=',$vendor_id[0]]])->get();
     
       
     }else{
          $menudata=Items::where('vendor_id',$vendor_id[0])->get();
     }
     $count=Addtocart::where('table_id',$request->table_id)->count();
        $category=Category::get();
   
       
       return view('frontend.menu',compact('menudata','category','id','count')); 
    
 }

}
