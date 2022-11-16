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
                                <th scope="col" class="text-white">Nom du produit</th>
                                <th scope="col" class="text-white" >Icône</th>
                                <th scope="col" class="text-white" >Statut</th>
                                <th scope="col" class="text-white" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php($i=1)
                                @foreach($supports as $device)
                                    <tr>
                                        <th scope="row"><b class="text-dark">{{$i++}}</b></th>
                                        <td><b class="text-dark">{{$device->profile->firstname}} {{$device->profile->lastname}}</b></td>
                                        <td><img src="{{$device->profile->photo}}" style="height: 30px; width 20px;" alt=""></td>
                                        <td>{{$device->product->product}}</td>
                                        <td>{{$device->icon}}</td>
                                        @if($device->status =='send')
                                        <td><span class="badge bagde-sm bg-success">{{$device->status}}</span></td>
                                        @else
                                        <td><span class="badge bagde-sm bg-danger">{{$device->status}}</span></td>
                                        @endif
                                        <td>
                                            <a href="{{url('/Problem/Detail/'.$device->id)}}">
                                                <button type="button" class="btn btn-primary btn-sm " id="seebtn">Voir</button>
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