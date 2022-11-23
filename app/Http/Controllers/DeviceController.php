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
        $devices = Parcel::where('userId',$id)->get();
        return view("myDevice.index",compact('devices'));    
    }
    // edit device page
    public function EditDevice($id){
        $devices = Parcel::find($id);
        return view("myDevice.detail",compact('devices'));    
    }

      // edit device page
      public function NoteParcel($id){
        $devices = Parcel::find($id);
        return view("myDevice.Notes",compact('devices'));    
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
}
