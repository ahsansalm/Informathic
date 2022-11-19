<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\config\brand;
use App\Models\config\product;
use App\Models\service;
use App\Models\User;
use Auth;
use Image;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Carbon;
use DB;
class UserController extends Controller
{
    // fetxh product from brnad
    public function fetchbrandproduct(Request $request){
   
        if($request->ajax())
        {
        $output_sub="";
        $data = product::where('product_Id',$request->id)->get();
        $table_sub = $data->count();
        if($table_sub > 0)
            {
                foreach ($data as $key => $tech_data) {
                    $output_sub.=
                "<div class='col-md-3 col-sm-6  image_col '>".
                "<img class='img-fluid img-fluid2' src='$tech_data->image'>".
                "<button type= 'button' class='btn btn-outline-success btn-block next-step mt-3 service_click' onClick='addItem(value)' value='$tech_data->id'>".$tech_data->product_name."</button>".
               "</div>";
                }
                return Response($output_sub);  }
            }    
    }
    
       // fetxh fetchproducctservice from brnad
       public function fetchproducctservice(Request $request){
   
        if($request->ajax())
        {
        $output_sub="";
        $data = service::where('product_id',$request->value)->get();
        $table_sub = $data->count();
        if($table_sub > 0)
            {
                foreach ($data as $key => $tech_data) {
                    $output_sub.=
                "<div class='col-md-3 col-sm-6  image_col mt-2 ps4_fat px-md-2 px-3'>".
                    "<div class='card'>". 
                            " <img class='card-img-top img-fluid img-fluid2'  src='$tech_data->image'>".
                        "<div class='card-body'>".
                            "<h5>".$tech_data->service."</h5>".
                            "<button type= 'button' class='btn btn-outline-success btn-block next-step mt-3 ' value='$tech_data->price'>".$tech_data->price."</button>".
                        "</div>".
                    "</div>".
               "</div>";
                                        
                }
                return Response($output_sub);  
            }
        }    
    }
}
