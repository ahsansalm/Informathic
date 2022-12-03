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

class reportingController extends Controller
{
    // reporting page
    public function reporting(){
        $allorder =  DB::table('invoices')->where('totalPrice' ,'!=', 'Quotation')->count();
        $pendingorder = DB::table('invoices')->where('totalPrice' ,'!=', 'Quotation')->where('status' ,'=', 'pending')->count();
        $approvedorder = DB::table('invoices')->where('totalPrice' ,'!=', 'Quotation')->where('status' ,'=', 'Approuvé')->count();
        $sale = DB::table('invoices')->sum('totalPrice');
        $pur1 = DB::table('services')->sum('stock');
        $pur2 = DB::table('services')->sum('purchase_price');
        $purchase = $pur1 * $pur2;



        
        $todaySale = DB::table('invoices')
            ->whereDate('date', now())->sum('totalPrice');
        return view("reporting.index",compact('allorder','pendingorder','approvedorder','sale','purchase','todaySale'));
    }


    // todayreport pager
    public function todayreport(){
        return view("reporting.today");
    }


      // yajra  for todayreportdata
      public function todayreportdata()
      {
          return Datatables::of(Parcel::query()->whereDate('date', now()))
        ->editColumn('serviceRequest', function($order)
        {
           return $order->servicedata->service;
        })

        
          ->editColumn('created_at',function(Parcel $Parcel){
              return $Parcel->created_at->diffForHumans();
          })
          
          ->make(true);
      }


    
}
