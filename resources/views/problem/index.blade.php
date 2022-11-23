@extends('layouts.informathic')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="col-12 text-center">
                <div class="dashboard_image" >
                    <h1 class="brand_device mt-5">Problèmes utilisateur</h1> 
                </div>
            </div>
           

            <div class="card-body">
                    <table class="table mt-2">
                        <thead style="background: rgb(12, 23, 65);">
                            <tr>
                                <th scope="col" class="text-white">#</th>
                                <th scope="col" class="text-white">Nom d'utilisateur</th>
                                <th scope="col" class="text-white">Image</th>
                                <th scope="col" class="text-white">Des marques</th>
                                <th scope="col" class="text-white">Produit</th>
                                <th scope="col" class="text-white">Demande de service</th>
                                <th scope="col" class="text-white">Statut</th>
                                <th scope="col" class="text-white" >Option</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php($i=1)
                                @foreach($supports as $device)
                                    <tr>
                                        <th scope="row"><b class="text-dark">{{$i++}}</b></th>
                                        <td><b class="text-dark">{{$device->user->firstname}} {{$device->user->lastname}}</b></td>
                                        <td>
                                            <img src="{{$device->user->photo}}" style="height: 30px; width: 30px; border-radius:50%;" alt="">
                                        </td>
                                        <td><b class="text-dark">{{$device->marks}}</b></td>
                                        <td>{{$device->product}}</td>
                                        <td>{{$device->serviceRequest}}</td>
                                            @if($device->admin_chat =='Lis')
                                            <td><span class="badge bagde-sm bg-success">{{$device->admin_chat}}</span></td>
                                            @else
                                            <td><span class="badge bagde-sm bg-danger">{{$device->admin_chat}}</span></td>
                                            @endif
                                        <td>
                                            <a href="{{url('/problem/Detail/'.$device->id)}}">
                                                <button type="button" class="btn btn-primary btn-sm">Soutien</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
            </div>

            
        </div>
    </div>
    </div>
@endsection