<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;
use Auth;
use App\Models\Invoices;
use App\Models\Support;
use Illuminate\Support\Carbon;
class SupportController extends Controller
{
    //page 
    public function mySupport(){
        $id = Auth::user()->id;
        $supports = Parcel::where('userId',$id)->get();
        return view("support.index",compact('supports'));    
    }
    // edit support page
    public function EditSupport($id){
        $supports = Parcel::find($id);
        return view("support.detail",compact('supports'));    
    }
    // add problem
    public function AddSupport(Request $request){
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
}
