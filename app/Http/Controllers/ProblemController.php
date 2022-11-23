<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\ProblemReply;
use Illuminate\Support\Carbon;
use DB;

class ProblemController extends Controller
{
    // problem page controller
    public function problem(){
        $supports = Support::orderBy('id', 'DESC')->get();
        return view("problem.index",compact('supports'));
    }
    // problem detail page
    public function problemDetail($id){
        $supports = Support::find($id);
        $chat = Support::all();
        return view("problem.detail",compact('supports','chat'));    
    }
    // reply to problem
    public function ReplyProb(Request $request){
        $save = Support::find($request->update_id);
        $save->status = "send";
        $save->save();

        $problemReply = ProblemReply::create([
            'userId' => $request->userId,
            'productId' => $request->productId,
            'problem' => $request->problem,
            'object' => $request->object,
            'icon' => $request->icon,
            'answer' => $request->answer,
            'created_at' => Carbon::now(),
            ]);
            return response('success');
    }
}
