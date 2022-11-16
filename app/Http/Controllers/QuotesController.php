<?php

namespace App\Http\Controllers;
use App\Models\Parcel;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Models\Invoices;

class QuotesController extends Controller
{
    // page
    public function myQuotes(){
        $id = Auth::user()->id;
        $devices = Invoices::where('user_id',$id)->where('totalPrice', 'Quotation')->orderBy('id', 'DESC')->where('status','Approved')->get();
        return view("quotes.index",compact('devices'));    
    }

    // quotes approved order
    public function quotesValue(Request $request,$id){
        Invoices::find($id)->update([
            'totalPrice' => $request->Price,
        ]);
        $notification = array(
            'message' => ' Commande effectuée avec succès!',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with( $notification);
    }

}
