@extends('layouts.informathic')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="col-12 text-center">
                <div class="dashboard_image">
                    <h1 class="brand_device mt-5">Citation de l'utilisateur</h1>
                     
                </div>
            </div>
            <div class="card-body">
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
                                    <th scope="col" class="text-white">Devis Prix</th>
                                    <th scope="col" class="text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($devices as $device)
                                    <form action="{{url('/quotes/approved/'.$device->id)}}" method='POST'>
                                        @csrf
                                        <tr>
                                            <th scope="row"><b class="text-dark">{{$i++}}</b></th>
                                            <td><b>{{$device->user->firstname}} {{$device->user->lastname}} </b></td>
                                            <td><img src="{{$device->user->photo}}  " style="height: 30px; width 20px;" alt=""></td>
                                            <td><b class="text-dark">{{$device->product->marks}}</b></td>
                                            <td>{{$device->product->product}}</td>
                                            <td>{{$device->product->serviceRequest}}</td>
                                            @if($device->status =='Approved')
                                            <td><span class="badge bagde-sm bg-success">{{$device->status}}</span></td>
                                            @else
                                            <td><span class="badge bagde-sm bg-danger">{{$device->status}}</span></td>
                                            @endif
                                            <td><b>{{$device->totalPrice}}</b></td>
                                            <td>
                                                <input type="text" value="{{$device->quotePrice}}" class="form-control" name="totalPrice">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-primary">Donner</button>
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
