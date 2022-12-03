<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;
use Auth;
use App\Models\Invoices;
use App\Models\Support;
use App\Models\ProblemReply;
use Illuminate\Support\Carbon;
use DB;
class SupportController extends Controller
{
    //page 
    public function mySupport(){
        $id = Auth::user()->id;
        
        $input = [  
            'noti' => 'ok'
        ];
            Parcel::where('userId', '=', $id)->update($input);
            
        $supports = Parcel::where('userId',$id)->get();
        $Parcel = Parcel::first();


        return view("support.index",compact('Parcel','supports'));    
    }
    // edit support page
    public function EditSupport($id){
        $parcel = Parcel::find($id);
        $parcel->chat ='Lis';
        $parcel->save();

        $userId = Auth::user()->id;
        $parcel = Parcel::find($id);
        $supports = Support::where('userId',$userId)->where('productId',$id)->get();
        $reply = ProblemReply::where('userId',$userId)->where('productId',$id)->get();
        $Parcel = Parcel::first();
        return view("support.detail",compact('parcel','supports','reply','Parcel'));    
    }
    // add problem
    public function AddSupport(Request $request){
        DB::table('parcels')->where('admin_noti', '=', 1)->update(array('admin_noti' => 'Nouveau'));

        $save = Parcel::find($request->productId);
        $save->admin_chat = "Nouveau";
        $save->save();

        $parcel = Support::create([
            'userId' => $request->userId,
            'productId' => $request->productId,
            'problem' => $request->problem,
            'object' => $request->object,
            'icon' => $request->icon,
            'created_at' => Carbon::now(),
            ]);
            return response('success');
    }

     // add problem
     public function AddSupportNew(Request $request){

        $parcel = Support::create([
            'userId' => $request->userId,
            'productId' => $request->productId,
            'problem' => $request->problem,
            'object' => $request->object,
            'status' => 'Not',
            'icon' => $request->icon,
            'created_at' => Carbon::now(),
            ]);
            return response('success');
    }
}
