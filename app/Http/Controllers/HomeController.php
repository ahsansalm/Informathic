<?php

namespace App\Http\Controllers;
use App\Models\Invoices;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Support;
use App\Models\Parcel;
use DB;
use Yajra\Datatables\Datatables;
use App\Models\ProblemReply;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified', 'auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $Parcel = Parcel::first();
        $users = User::where('role_as','0')->get(); 
        $countProblems = DB::table('problem_replies')->count();
        $totalUsers =  DB::table('users')->where('role_as','0')->count();
        $id = Auth::user()->id;
        $invoices = Invoices::where('user_id',$id)->orderBy('id', 'DESC')->take(5)->get();
        $ProblemReply = ProblemReply::where('userId',$id)->orderBy('id', 'DESC')->take(5)->get();
        $devices = Parcel::where('userId',$id)->orderBy('id', 'DESC')->where('status','pending')->take(5)->orderBy('id', 'DESC')->get();

        $quotes = Invoices::where('user_id',$id)->where('totalPrice', 'Quotation')->orderBy('id', 'DESC')->where('status','Approved')->get();

        return view('admin.user',compact('users','totalUsers','countProblems','invoices','ProblemReply','devices','quotes','Parcel'));    
    }

      // yajra  for user
      public function getusers()
      {
          return Datatables::of(User::query()->where('role_as','0'))
          ->editColumn('created_at',function(User $User){
              return $User->created_at->diffForHumans();
          })
          
          ->make(true);
      }


    // user detail
    public function userDetail($id){
        $user = User::find($id);
        return view("admin.userDetail",compact('user'));
    }

    // userDisabled
    public function userDisabled($id){
        $users = User::find($id);
        $users->status = "Handicapé";
        $users->update();
         $notification = array(
                'message' => 'Vous avez désactivé cet utilisateur!',
                'alert_type' => 'error'
            );
            return Redirect('/home')->with($notification);
    }



     // userDisabled
     public function useractive($id){
        $users = User::find($id);
        $users->status = "Actif";
        $users->update();
         $notification = array(
                'message' => 'Vous activez cet utilisateur!',
                'alert_type' => 'success'
            );
            return Redirect('/home')->with($notification);
    }
}
