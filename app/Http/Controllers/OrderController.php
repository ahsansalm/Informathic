<?php

namespace App\Http\Controllers;
use App\Models\Parcel;
use Auth;
use DB;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Invoices;

class OrderController extends Controller
{
     //page
     public function myOrder(){
        $id = Auth::user()->id;
        $devices = Parcel::where('userId',$id)->orderBy('id', 'DESC')->where('status','pending')->orWhere('status','Refus')->orderBy('id', 'DESC')->get();
        return view("order.index",compact('devices'));
    }


    // all user order page
    public function userorder(){
        $devices = Invoices::orderBy('id', 'DESC')->where('totalPrice','!=','Quotation')->get();
        $totalOrder = DB::table('parcels')->count();
        $pendingOrder = DB::table('parcels')->where('status','pending')->count();
        $approvedOrder = DB::table('parcels')->where('status','Approved')->count();
        return view("order.userOrder",compact('devices','totalOrder','pendingOrder','approvedOrder'));
    }




    // order approved
    public function orderApproved($id){
        Parcel::find($id)->update([
            'status' => 'Approved',
        ]);
        Invoices::where('productId',$id)->update([
            'status' => 'Approved',
        ]);
        $notification = array(
            'message' => 'Commande approuvée avec succès!',
            'alert_type' => 'success'
        );
        return Redirect("/userOrder")->with( $notification);
    }
        // approved order detail
        public function ApprovedOrderDetail($id){
            $device = Parcel::find($id);
            return view("order.approvedOrderDetail",compact('device'));
        }


           // approved order notes
           public function ApprovedOrderNotes($id){
            $device = Parcel::find($id);
            return view("order.approvedOrderNotes",compact('device'));
        }
            // order notes
            public function orderNotes(Request $request,$id){
                Parcel::find($id)->update([
                    'publicNote' => $request->publicNote,
                    'privateNote' => $request->privateNote,
                ]);
                $notification = array(
                    'message' => 'Remarque ajoutée!',
                    'alert_type' => 'success'
                );
                return Redirect("/userOrder")->with( $notification);
            }
    // user page to show approve order
    public function ApprovedOrder(){
        $id = Auth::user()->id;
        $devices = Parcel::where('userId',$id)->orderBy('id', 'DESC')->where('status','Approved')->orderBy('id', 'DESC')->get();
        return view("order.approvedOrder",compact('devices'));
    }
    // refuse order
    public function RefuseOrder(Request $request){
        $save = Parcel::find($request->userId);
        $save->status = 'Refus';
        $save->update();
        Invoices::where('productId',$request->userId)->update([
            'status' => 'Refus',
        ]);
        return response(['success','refuse']);
    }

    // quotation order
    public function userQuotes(){
        $devices = Invoices::orderBy('id', 'DESC')->where('totalPrice','=','Quotation')->get();
        return view("order.quotesOrder",compact('devices'));
    }

    // quotes approved
    public function quotesApproved(Request $request,$id){
        Invoices::find($id)->update([
            'quotePrice' => $request->totalPrice,
            'status' => 'Approved',
        ]);
        $notification = array(
            'message' => 'Devis approuvés avec succès!',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with( $notification);
    }


    // support wallet
    public function SupportWallet(){
        $id = Auth::user()->id;
        $totalPayment =
        $payment = Payment::where('userId',$id)
                ->selectRaw('SUM(payments.amount) AS sum')
                ->first()->sum;
        return view("wallet.index",compact('payment'));
    }

}
