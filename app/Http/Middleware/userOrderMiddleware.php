<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Parcel;
use Auth;
use DB;
use App\Models\Invoices;
class userOrderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user()->role_as;
        if ($user == 1) {
            DB::table('parcels')->where('order_noti', '=', 'Nouveau')->update(array('order_noti' => 1));

            $Parcel = Parcel::first();

            $devices = Invoices::where('totalPrice','!=','Quotation')->get();
            $totalOrder = DB::table('parcels')->count();
            $pendingOrder = DB::table('parcels')->where('status','pending')->count();
            $approvedOrder = DB::table('parcels')->where('status','Approved')->count();
            return response()->view("order.userOrder",compact('devices','totalOrder','pendingOrder','approvedOrder','Parcel')); 

        }
        else 
        { 
            return redirect('/home');
        }
    }
}
