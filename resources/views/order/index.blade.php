@extends('layouts.informathic')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="col-12 text-center">
                <div class="dashboard_image" >
                    <h1 class="brand_device mt-5">Voir mes commandes en attente</h1> 
                </div>
            </div>
            <div class="card-body">
                    <table class="table mt-2">
                        <thead style="background: rgb(12, 23, 65);">
                            <tr>
                                <th scope="col" class="text-white">#</th>
                                <th scope="col" class="text-white">Des marques</th>
                                <th scope="col" class="text-white">Produit</th>
                                <th scope="col" class="text-white"> Demande de service</th>
                                <th scope="col" class="text-white">Prix</th>
                                <th scope="col" class="text-white">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($devices as $device)
                                <tr>
                                    <th scope="row"><b class="text-dark">{{$i++}}</b></th>
                                    <td><b class="text-dark">{{$device->marks}}</b></td>
                                    <td>{{$device->product}}</td>
                                    <td>{{$device->serviceRequest}}</td>
                                    <td>{{$device->parcel->totalPrice}}</td>
                                    <td><span class="badge bg-danger">{{$device->status}}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    </div>
@endsection