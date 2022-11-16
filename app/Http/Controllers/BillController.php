<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoices;
use Auth;

class BillController extends Controller
{
    //page 
    public function myBill(){
        $id = Auth::user()->id;
        $invoices = Invoices::where('user_id',$id)->orderBy('id','DESC')->get();
        return view("bill.index",compact('invoices'));    
    }
    // edi tpage
     // edit bill page
     public function EditBill($id){
        $bills = Invoices::find($id);
        return view("bill.detail",compact('bills'));    
    }
}
