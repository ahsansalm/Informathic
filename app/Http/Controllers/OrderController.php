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
        $Parcel = Parcel::first();
        $devices = Parcel::where('userId',$id)->orderBy('id', 'DESC')->where('status','pending')->orWhere('status','Refus')->orderBy('id', 'DESC')->get();
        return view("order.index",compact('devices','Parcel'));
    }


    // all user order page
    public function userorder(){
        DB::table('parcels')->where('order_noti', '=', 'Nouveau')->update(array('order_noti' => 1));

        $devices = Invoices::where('totalPrice','!=','Quotation')->get();
        $Parcel = Parcel::first();
        return view("order.userOrder",compact('devices','totalOrder','pendingOrder','approvedOrder','Parcel'));
    }




    // order approved
    public function orderApproved(Request $request ,$id){
        $user = $request->userId;
        $serviceId =$request->serviceId;
        DB::table('parcels')->where('userId' , $user)->where('order_approved_noti', '=', Null)->update(array('order_approved_noti' => 'Nouveau'));
        DB::table('services')->where('id' , $serviceId)->decrement('stock'); 
        $Parcel = Parcel::first();
        Parcel::find($id)->update([
            'status' => 'Approuvé',
            'admin_status' => 'Appareil accepté',
        ]);
        Invoices::where('productId',$id)->update([
            'status' => 'Approuvé',
        ]);
        $notification = array(
            'message' => 'Commande approuvée avec succès!',
            'alert_type' => 'success'
        );
        return Redirect("/userOrder")->with( $notification);
    }
        // approved order detail
        public function ApprovedOrderDetail($id){
            $Parcel = Parcel::first();
            $device = Parcel::find($id);
            return view("order.approvedOrderDetail",compact('device','Parcel'));
        }


           // approved order notes
           public function ApprovedOrderNotes($id){
            $device = Parcel::find($id);
            $Parcel = Parcel::first();
            return view("order.approvedOrderNotes",compact('device','Parcel'));
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
        DB::table('parcels')->where('userId', '=', $id)->where('order_approved_noti', '=', 'Nouveau')->update(array('order_approved_noti' => Null));
        $Parcel = Parcel::first();
        $devices = Parcel::where('userId',$id)->orderBy('id', 'DESC')->where('status','APPROUVÉ')->orderBy('id', 'DESC')->get();
        return view("order.approvedOrder",compact('devices','Parcel'));
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

    // recievedOrder order
    public function recievedOrder(Request $request){
        $save = Parcel::find($request->userId);
        $save->admin_status = 'Reçu';
        $save->update();
        return response(['success','Reçu']);
    }


    // progress order
    public function progressOrder(Request $request){
        $save = Parcel::find($request->userId);
        $save->admin_status = 'en cours';
        $save->update();
        return response(['success','en cours']);
    }


     // waiting order
     public function waitingOrder(Request $request){
        $save = Parcel::find($request->userId);
        $save->admin_status = 'SALLE DATTENTE';
        $save->update();
        return response(['success','DATTENTE']);
    }


     // repair order
     public function repairOrder(Request $request){
        $save = Parcel::find($request->userId);
        $save->admin_status = 'Réparé';
        $save->update();
        return response(['success','Réparé']);
    }


     // return order
     public function returnOrder(Request $request){
        $save = Parcel::find($request->userId);
        $save->admin_status = 'Retour au client';
        $save->update();
        return response(['success','Retour au client']);
    }




    // quotation order
    public function userQuotes(){
        $Parcel = Parcel::first();
        $devices = Invoices::orderBy('id', 'DESC')->where('totalPrice','=','Quotation')->get();
        return view("order.quotesOrder",compact('devices','Parcel'));
    }

    // quotes approved
    public function quotesApproved(Request $request,$id){
        $validateData = $request->validate([
            'quotePrice' => 'required|max:255',
        ],
        [
            'quotePrice.required' => 'Ce champ est requis',
         
        ]);
        $input = [  
            'quotePrice' => $request->quotePrice,
            'status' => 'Approved',
        ];
            Invoices::where('productId', '=', $id)->update($input);

        $notification = array(
            'message' => 'Devis approuvés avec succès!',
            'alert_type' => 'success'
        );
        return Redirect('/userQuotes')->with( $notification);
    }

     // refuse quote
     public function RefuseQuote(Request $request){
        $save = Parcel::find($request->userId);
        $save->status = 'Refus';
        $save->update();
        Invoices::where('productId',$request->userId)->update([
            'status' => 'Refus',
        ]);
        return response(['success','refuse']);
    }


    // search order
    public function searchOrder(Request $request)
        {

            if($request->ajax())
            {
            $output_sub="";
            $product = Parcel::where('marks','LIKE','%'.$request->search.'%')->get();      
            $table_sub = $product->count();
            
            if($table_sub > 0)
                {

                      foreach($product as $device){
                        $output_sub.=  "<tr>".
                                "<td><b>".$device->id."</b></td>".
                                "<td><b>".$device->user->firstname.' '.$device->user->lastname." </b></td>".
                                "<td>"."<img src=$device->user->photo' >"."</td>".
                                "<td><b class='text-dark'>".$device->marks."</b></td>".
                                "<td>".$device->product."</td>".
                                "<td>".$device->serviceRequest."</td>".
                               " <td>".
                               
                               
                                "<span class='badge bagde-sm bg-success'>".$device->status."</span>".
                            

                               "</td>".
                                "</tr>";
                        }
                        
                    return Response($output_sub);
                }
                else{
                    return Response($output_sub);
                }
                return Response($table_sub);
                    
            }
        }
    


    // support wallet
    public function SupportWallet(){

        $id = Auth::user()->id;
        $totalPayment =
        $payment = Payment::where('userId',$id)
                ->selectRaw('SUM(payments.amount) AS sum')
                ->first()->sum;
                $Parcel = Parcel::first();
        return view("wallet.index",compact('payment','Parcel'));
    }


     // quotesDetail
     public function quotesDetail($id){
        $Parcel = Parcel::first();
        $device = Parcel::find($id);
        return view("order.quotesDetail",compact('device','Parcel'));
    }

}
