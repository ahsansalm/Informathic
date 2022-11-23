@extends('layouts.informathic')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="col-12 text-center">
                <div class="dashboard_image" >
                    <h1 class="brand_device mt-5">Commande de l'utilisateur</h1>
                     
                </div>
            </div>
            <div class="card-body">
                <!-- <h3 class="card-title text-center">Total Orders: <span class="badge bg-primary mr-5">{{$totalOrder}}</span> 
                Approved Orders: <span class="badge bg-success mr-5">{{$approvedOrder}}</span>
                Pending Orders: <span class="badge bg-danger">{{$pendingOrder}}</span></h3> -->
                        <table class="table mt-2">
                            <thead style="background: rgb(12, 23, 65);">
                                <tr>
                                    <th scope="col" class="text-white">#</th>
                                    <th scope="col" class="text-white">Nom d'utilisateur</th>
                                    <th scope="col" class="text-white">Image utilisateur</th>
                                    <th scope="col" class="text-white">Des marques</th>
                                    <th scope="col" class="text-white">Produit</th>
                                    <th scope="col" class="text-white">Demande de service</th>
                                    <th scope="col" class="text-white">Statut</th>
                                    <th scope="col" class="text-white">Prix</th>
                                    <th scope="col" class="text-white">Remarques</th>
                                    <th scope="col" class="text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($devices as $device)
                                    <form>
                                        <tr>
                                            <th scope="row"><b class="text-dark">{{$i++}}</b></th>
                                            <th scope="row" hidden><b class="text-dark">{{$device->id}}</b></th>
                                            <td><b>{{$device->user->firstname}} {{$device->user->lastname}} </b></td>
                                            <td><img src="{{$device->user->photo}}  " style="height: 30px; width 20px;" alt=""></td>
                                            <td><b class="text-dark">{{$device->product->marks}}</b></td>
                                            <td>{{$device->product->product}}</td>
                                            <td>{{$device->product->serviceRequest}}</td>
                                            @if($device->product->status =='Approved')
                                            <td><span class="badge bagde-sm bg-success">{{$device->product->status}}</span></td>
                                            @else
                                            <td><span class="badge bagde-sm bg-danger">{{$device->product->status}}</span></td>
                                            @endif
                                            <td>{{$device->totalPrice}}</td>
                                            <td>
                                                <a href="{{url('Approved/order/notes/'.$device->productId)}}">
                                                    <button type="button" class="btn btn-sm btn-warning">Remarques</button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{url('Approved/order/detail/'.$device->productId)}}">
                                                    <button type="button" class="btn btn-sm btn-primary">Voir</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
    </div>
@endsection
