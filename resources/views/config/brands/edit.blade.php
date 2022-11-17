@extends('layouts.informathic2')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

<div class="row">
    <div class="col-12 text-center">
        <div class="dashboard_image">
            <h1 class="brand_device mt-5">Edit Brand</h1> 
        </div>
    </div>

    <div class="col-lg-12 my-3">
        <div class="card">
            <div class="card-header">
            Update brand
            </div>
            <div class="card-body">
                <form action="{{url('config/product/add')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom de marque *</label>
                        <input type="text" name="product_name" value="{{$brand->product_name}}" class="form-control" >
                        @error('product_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <img src="{{$brand->image}}"style="height: 200px; width: 200px;" alt="">
                        <br>
                        <label for="exampleInputEmail1" class="mt-2">Sélectionner une image *</label>
                        <input type="file" name="image" class="form-control" >
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{url('/configuration/Marque')}}" class="text-white">
                                    <button type="button" class="btn btn-block next-step">
                                Retour
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-block next-step">Ajouter</button>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>


  
</div>
@endsection