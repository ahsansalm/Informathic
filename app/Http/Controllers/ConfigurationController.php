<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\config\brand;
use App\Models\User;
use Auth;
use Image;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Carbon;

class ConfigurationController extends Controller
{
    // index page
    public function index(){
        return view("config.index");
    }
    

    // brand page
    public function brands(){
        return view('config.brands.index');
    }
    // yajra  for brand
    public function getbrands()
        {
            return Datatables::of(brand::query())->make(true);
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

        return view('config.brands.edit' ,compact('brand'));

    }
}
