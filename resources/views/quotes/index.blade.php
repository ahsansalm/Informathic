@extends('layouts.informathic')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="col-12 text-center">
                <div class="dashboard_image" >
                    <h1 class="brand_device mt-5">Voir mes devis actifs</h1> 
                </div>
            </div>
            <div class="card-body">
                    <table class="table mt-2">
                        <thead style="background: rgb(12, 23, 65);">
                            <tr>
                                <th scope="col" class="text-white">#</th>
                                <th scope="col" class="text-white">Des marques</th>
                                <th scope="col" class="text-white">Produit</th>
                                <th scope="col" class="text-white">Demande de service</th>
                                <th scope="col" class="text-white">Statut</th>
                                <th scope="col" class="text-white">Prix</th>
                                <th scope="col" class="text-white" style="width: 80px;">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                                @foreach($devices as $device)
                                    <form action="{{url('/quotes/value/'.$device->id)}}" method='POST'>
                                        @csrf
                                        <tr>
                                            <th scope="row"><b class="text-dark">{{$i++}}</b></th>
                                            <td><b class="text-dark">{{$device->product->marks}}</b></td>
                                            <td>{{$device->product->product}}</td>
                                            <td>{{$device->product->serviceRequest}}</td>
                                            @if($device->status =='Approved')
                                            <td><span class="badge bagde-sm bg-success">{{$device->status}}</span></td>
                                            @else
                                            <td><span class="badge bagde-sm bg-danger">{{$device->status}}</span></td>
                                            @endif
                                            <td><b>{{$device->quotePrice}}</b></td>
                                            <td hidden><input type="text" value="{{$device->quotePrice}}" name="Price">{{$device->quotePrice}}</td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-primary">Ordre</button>
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