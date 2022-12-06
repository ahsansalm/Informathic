<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoices;
use App\Models\Parcel;
use Auth;

class BillController extends Controller
{
    //page 
    public function myBill(){
        $id = Auth::user()->id;
        $invoices = Invoices::where('user_id',$id)->orderBy('id','DESC')->get();
        $Parcel = Parcel::first();
        return view("bill.index",compact('invoices','Parcel'));    
    }
    // edi tpage
     // edit bill page
     public function EditBill($id){
        $bills = Invoices::find($id);
        $Parcel = Parcel::first();
        return view("bill.detail",compact('bills','Parcel'));    
    }


    
       // search bill
       public function searchbill(Request $request)
       { 
         $search = $request->search ?? "";
         $id = Auth::user()->id;
         if($search != ""){
           $invoices = Invoices::where('product','LIKE','%'.$search.'%')->where('user_id',$id)->get();
             
         }else{
            $invoices = Invoices::where('user_id',$id)->orderBy('id','DESC')->get(); 
       }
         $Parcel = Parcel::first();
         return view("bill.search",compact('search','invoices','Parcel')); 
   
       }

}
