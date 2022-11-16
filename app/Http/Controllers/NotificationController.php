<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProblemReply;
use auth;
class NotificationController extends Controller
{
    // notification page
    public function notification(){
        $id = Auth::user()->id;
        $ProblemReply = ProblemReply::where('userId',$id)->orderBy('id', 'DESC')->get();
        return view("notification.index",compact('ProblemReply'));
    }
    // notification detail
    public function notiDetail($id){
        $ProblemReply = ProblemReply::find($id);
        $ProblemReply->status = 'lis';
        $ProblemReply->update();
        return view("notification.detail",compact('ProblemReply'));   
    }
}
