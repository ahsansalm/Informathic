<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\config\brand;
use App\Models\config\product;
use App\Models\service;
use App\Models\Parcel;
use App\Models\User;
use Auth;
use Image;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Carbon;
use DB;
class ConfigurationController extends Controller
{
    // index page
    public function index(){
        $Parcel = Parcel::first();
        return view("config.index",compact('Parcel'));
    }
    

    // brand page
    public function brands(){
        $brand = DB::table('brands')->first();
        $Parcel = Parcel::first();
        return view('config.brands.index',compact('brand','Parcel'));
    }
    // yajra  for brand
    public function getbrands()
        {
            return Datatables::of(brand::query())
            ->editColumn('created_at',function(brand $brand){
                return $brand->created_at->diffForHumans();
            })
            ->make(true);
        }

    // brand add
    public function addBrands(Request $request){
        $validateData = $request->validate([
            'product_name' => 'required|unique:brands|max:255',
            'image'        =>  'required|image|mimes:jpeg,png,jpg|max:2048'
        ],
        [
            'product_name.required' => 'Ce champ est requis',
            'product_name.unique' => 'Nom du produit unique',
            'image.required' => 'Ce champ est requis',
            'image.mimes' => 'Limage doit être .jpg, .jpeg, .png,',
            'image.max' => 'La taille de limage doit être inférieure à 2 Mo',
        ]);

        $id = Auth::user()->id;
        $photo = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$photo->GetClientOriginalExtension();
        Image::make($photo)->resize(300,200)->save('img/brand/'.$name_gen);
        $last_img = 'img/brand/'.$name_gen;

        brand::insert([
            'user_id' => $id,
            'product_name' => $request->product_name,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Compte utilisateur créé !',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // edit brand page
    public function editBrand($id){
        $brand = brand::find($id);
        $Parcel = Parcel::first();

        return view('config.brands.edit' ,compact('brand','Parcel'));

    }

    // update brands
    public function updateBrands(Request $request, $id){
        $validateData = $request->validate([
            'product_name' =>  'min:3',
            'image'        =>  'image|mimes:jpeg,png,jpg|max:2048'
        ],
        [
            'product_name.min' => 'Nom Requis au moins 3 caractères  ',
            'image.mimes' => 'Limage doit être .jpg, .jpeg, .png,',
            'image.max' => 'La taille de limage doit être inférieure à 2 Mo',
        ]);
        $photo = $request->file('image');
        if($photo){
            $name_gen = hexdec(uniqid()).'.'.$photo->GetClientOriginalExtension();
            Image::make($photo)->resize(300,200)->save('img/brand/'.$name_gen);

            $last_img = 'img/brand/'.$name_gen;

            brand::find($id)->update([
                'product_name' => $request->product_name,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Mise à jour de la marque !',
                'alert_type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            brand::find($id)->update([
                'product_name' => $request->product_name,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Mise à jour de la marque !',
                'alert_type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
    }
    // delete brnad
    public function DeleteBrand($id){
        DB::table('brands')->where('id', $id)->delete();
        // this is for delete all brand products in product list
        DB::table('products')->where('product_id', $id)->delete();
        // this is to delete all service of same product
        DB::table('services')->where('marks_id', $id)->delete();

        $notification = array(
            'message' => 'Marque supprimée!',
            'alert_type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    // product page
    public function Products(){
        $brands = brand::all();
        $product = product::first();
        $Parcel = Parcel::first();
        return view('config.product.index',compact('brands','product','Parcel'));
    }


    // product add
    public function addProducts(Request $request){
        $validateData = $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'product_id' => 'required',
            'image'        =>  'required|image|mimes:jpeg,png,jpg|max:2048'
        ],
        [
            'product_name.required' => 'Ce champ est requis',
            'product_id.required' => 'Ce champ est requis',
            'product_name.unique' => 'Nom du produit unique',
            'image.required' => 'Ce champ est requis',
            'image.mimes' => 'Limage doit être .jpg, .jpeg, .png,',
            'image.max' => 'La taille de limage doit être inférieure à 2 Mo',
        ]);

        $id = Auth::user()->id;
        $photo = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$photo->GetClientOriginalExtension();
        Image::make($photo)->resize(300,200)->save('img/product/'.$name_gen);
        $last_img = 'img/product/'.$name_gen;

        product::insert([
            'user_id' => $id,
            'product_name' => $request->product_name,
            'product_id' => $request->product_id,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => ' Ajouter un produit!',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

      // yajra  for product
      public function getproducts()
      {
          return Datatables::of(product::query())
          ->editColumn('product_id',function(product $product){
            return $product->brand->product_name;
        })
          ->editColumn('created_at',function(product $product){
              return $product->created_at->diffForHumans();
          })
          ->make(true);
      }


       // edit product page
    public function editProducts($id){
        $brands = brand::all();
        $products = product::find($id);
        $Parcel = Parcel::first();
        return view('config.product.edit' ,compact('products','brands','Parcel'));

    }

    // update brands
    public function updateProducts(Request $request, $id){
        $validateData = $request->validate([
            'product_name' =>  'min:3',
            'image'        =>  'image|mimes:jpeg,png,jpg|max:2048'
        ],
        [
            'product_name.min' => 'Nom Requis au moins 3 caractères  ',
            'product_name.unique' => 'Nom du produit unique  ',
            'image.mimes' => 'Limage doit être .jpg, .jpeg, .png,',
            'image.max' => 'La taille de limage doit être inférieure à 2 Mo',
        ]);
        $photo = $request->file('image');
        if($photo){
            $name_gen = hexdec(uniqid()).'.'.$photo->GetClientOriginalExtension();
            Image::make($photo)->resize(300,200)->save('img/product/'.$name_gen);

            $last_img = 'img/product/'.$name_gen;

            product::find($id)->update([
                'product_name' => $request->product_name,
                'product_id' => $request->product_id,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Mise à jour du produit!',
                'alert_type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            product::find($id)->update([
                'product_name' => $request->product_name,
                'product_id' => $request->product_id,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Mise à jour du produit!',
                'alert_type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // delete product
    public function DeleteProducts($id){
        product::find($id)->delete();

        // this is for delete service of product
        DB::table('services')->where('product_id', $id)->delete();

        $notification = array(
            'message' => 'Suppression de produit!',
            'alert_type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    // product page
    public function Services(){
        $brands = brand::all();
        $products = product::all();
        $service = DB::table('services')->first();
        $Parcel = Parcel::first();
        return view('config.service.index',compact('brands','products','service','Parcel'));
    }

      // yajra  for service
      public function getservices()
      {
          return Datatables::of(service::query())
          ->editColumn('product_id',function(service $service){
            return $service->product->product_name;
        })
          ->editColumn('created_at',function(service $service){
              return $service->created_at->diffForHumans();
          })
          ->make(true);
      }


     // service add
     public function addServices(Request $request){
        $validateData = $request->validate([
            'service' => 'required|max:255',
            'product_id' => 'required',
            'image'        =>  'image|mimes:jpeg,png,jpg|max:2048'
        ],
        [
            'service.required' => 'Ce champ est requis',
            'product_id.required' => 'Ce champ est requis',
            'image.mimes' => 'Limage doit être .jpg, .jpeg, .png,',
            'image.max' => 'La taille de limage doit être inférieure à 2 Mo',
        ]);

        $id = Auth::user()->id;
        if($photo = $request->file('image')){
        $name_gen = hexdec(uniqid()).'.'.$photo->GetClientOriginalExtension();
        Image::make($photo)->resize(300,200)->save('img/service/'.$name_gen);
        $last_img = 'img/service/'.$name_gen;

        service::insert([
            'user_id' => $id,
            'service' => $request->service,
            'product_id' => $request->product_id,
            'marks_id' => $request->marks_id,
            'price' => $request->price,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => ' Service ajouté!',
            'alert_type' => 'success'
        );
        return Redirect()->back()->with($notification);
        }else{
            $random_img = 'img/random2.jpg'; 
            service::insert([
                'user_id' => $id,
                'service' => $request->service,
                'product_id' => $request->product_id,
                'marks_id' => $request->marks_id,
                'price' => $request->price,
                'image' => $random_img,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => ' Service ajouté!',
                'alert_type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


      // edit service page
      public function editServices($id){
        $brands = brand::all();
        $products = product::all();
        $services = service::find($id);
        $Parcel = Parcel::first();
        return view('config.service.edit',compact('brands','products','services','Parcel'));

    }
   // update service
   public function updateServices(Request $request, $id){
    $validateData = $request->validate([
        'service' => 'min:3',
        'image'        =>  'image|mimes:jpeg,png,jpg|max:2048'
    ],
    [
        'service.min' => 'Nom Requis au moins 3 caractères ',
        'product_id.required' => 'Ce champ est requis',
        'image.mimes' => 'Limage doit être .jpg, .jpeg, .png,',
        'image.max' => 'La taille de limage doit être inférieure à 2 Mo',
    ]);
    $photo = $request->file('image');
        if($photo){
            $name_gen = hexdec(uniqid()).'.'.$photo->GetClientOriginalExtension();
            Image::make($photo)->resize(300,200)->save('img/service/'.$name_gen);
            $last_img = 'img/service/'.$name_gen;

            service::find($id)->update([
                'service' => $request->service,
                'product_id' => $request->product_id,
                'marks_id' => $request->marks_id,
                'price' => $request->price,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Mise à jour du produit!',
                'alert_type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            service::find($id)->update([
                'service' => $request->service,
                'product_id' => $request->product_id,
                'marks_id' => $request->marks_id,
                'price' => $request->price,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Mise à jour du produit!',
                'alert_type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
    }
      // delete service
      public function DeleteServices($id){
        service::find($id)->delete();
        $notification = array(
            'message' => 'Suppression de service!',
            'alert_type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

      // product fetch data for fee
      public function fetchProduct(Request $request){
        $data = product::where('id',$request->product)->first();
        return response($data);
    }


    
}
