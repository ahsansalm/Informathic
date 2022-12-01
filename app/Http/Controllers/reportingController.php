<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
}
