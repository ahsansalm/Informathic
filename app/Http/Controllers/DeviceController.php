<?php

namespace App\Http\Controllers;
use App\Models\Parcel;
use Auth;
use Illuminate\Http\Request;
use App\Models\Invoices;
class DeviceController extends Controller
{
    // my devices page
    public function myDevices(){
        $id = Auth::user()->id;
        $Parcel = Parcel::first();
        $devices = Parcel::where('userId',$id)->get();
        return view("myDevice.index",compact('devices','Parcel'));    
    }
    // edit device page
    public function EditDevice($id){
        $Parcel = Parcel::first();
        $devices = Parcel::find($id);
        return view("myDevice.detail",compact('devices','Parcel'));    
    }

      // edit device page
      public function NoteParcel($id){
        $Parcel = Parcel::first();
        $devices = Parcel::find($id);
        return view("myDevice.Notes",compact('devices','Parcel'));    
    }

    // delete parcel device
    public function DeleteDevice($id){
        Parcel::find($id)->delete();
        Invoices::where('productId', $id)->delete();
        $notification = array(
            'message' => 'Appareil supprimé avec succès!',
            'alert_type' => 'error'
        );
            return Redirect()->back()->with( $notification);
    }



    // search device
    public function searchdevice(Request $request)
    { 
      $search = $request->search ?? "";
      $id = Auth::user()->id;
      if($search != ""){
        $devices = Parcel::where('product','LIKE','%'.$search.'%')->where('userId',$id)->get();
          
      }else{
        $devices = Parcel::where('userId',$id)->get();        
    }
      $Parcel = Parcel::first();
      return view("myDevice.search",compact('devices','Parcel','search'));  

    }



}
