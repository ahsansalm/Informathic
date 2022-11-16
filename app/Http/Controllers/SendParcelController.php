<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;
use App\Models\Invoices;
use Illuminate\Support\Carbon;

class SendParcelController extends Controller
{
    // sedn parcel
    public function sendParcel(){
        return view("sendParcel.index");    
    }
    // success parcel
    public function successParcel(){
        return view("sendParcel.success");    
    }

    // insert parcel
    public function insert(Request $request){
        $parcel = Parcel::create([
            'userId' => $request->userId,
            'marks' => $request->marks,
            'product' => $request->product,
            'serviceRequest' => $request->service,
            'information' => $request->information,
            'problems' => $request->problem,
            'shipment' => $request->shipment,
            'returnChoice' => $request->returnChoice,
            'created_at' => Carbon::now(),
        ]);
        $id = $parcel->id;
        Invoices::insert([
            'user_id' => $request->userId,
            'productId' => $id,
            'totalPrice' => $request->price,
            'date' => Carbon::now(),
        ]);
        return response(['success','Colis téléchargé avec succès']);    
    }
}
