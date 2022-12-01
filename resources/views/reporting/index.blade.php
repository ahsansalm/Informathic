@extends('layouts.informathic')
@section('content')
<div class="row">
    <div class="col-12 text-center">
        <div class="dashboard_image">
            <h1 class="brand_device mt-5">Rapports</h1> 
        </div>
    </div>
</div>

<div class="row my-3">
    <div class="col-12">
        <h4 class=" text-dark mb-2">Historique des commandes:</h4>
    </div>

    <div class="col-md-4">
        <a href="{{url('/userOrder')}}"> 
            <div class="card card_back-con">
                <div class="card-body ">
                    <h4>Commandes totales:<span class="badge bg-primary float-right">{{$allorder}}</span></h4>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{url('/userOrder')}}"> 
            <div class="card card_back-con">
                <div class="card-body ">
                    <h5>Commandes approuvées: <span class="badge bg-success float-right">{{$approvedorder}}</span></h5>
                </div>
            </div>
        </a>
    </div>


    <div class="col-md-4">
        <a href="{{url('/userOrder')}}"> 
            <div class="card card_back-con">
                <div class="card-body ">
                    <h4>Les ordres en attente: <span class="badge bg-danger  float-right">{{$pendingorder}}</span></h4>
                </div>
            </div>
        </a>
    </div>


    <div class="col-12">
    <hr>
        <h4 class=" text-dark my-2">Revenu total:</h4>
    </div>


    <div class="col-md-6">
        <a href="{{url('/userOrder')}}"> 
            <div class="card card_back-con">
                <div class="card-body ">
                    <h4>Vente totale: <span class="badge bg-success float-right p-3">{{$sale}} €</span></h4>
                </div>
            </div>
        </a>
    </div>


    <div class="col-md-6">
        <a href="{{url('/userOrder')}}"> 
            <div class="card card_back-con">
                <div class="card-body ">
                    <h4>Achat totale: <span class="badge bg-primary float-right p-3">{{$purchase}} €</span></h4>
                </div>
            </div>
        </a>
    </div>



    <div class="col-12">
    <hr>
        <h4 class=" text-dark my-2">Aujourd'hui Revenu:</h4>
    </div>


    <div class="col-md-12">
        <a href="{{url('/userOrder')}}"> 
            <div class="card card_back-con">
                <div class="card-body ">
                    <h4>Vente totale: <span class="badge bg-success float-right p-3">{{$todaySale}} €</span></h4>
                </div>
            </div>
        </a>
    </div>


</div>
@endsection