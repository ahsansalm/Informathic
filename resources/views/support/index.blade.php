@extends('layouts.informathic')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="col-12 text-center">
                <div class="dashboard_image" >
                    <h1 class="mt-5">Voir mon support actif</h1> 
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
                                <th scope="col" class="text-white" >Option</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php($i=1)
                                @foreach($supports as $device)
                                    <tr>
                                        <th scope="row"><b class="text-dark">{{$i++}}</b></th>
                                        <td><b class="text-dark">{{$device->marks}}</b></td>
                                        <td>{{$device->product}}to</td>
                                        <td>{{$device->serviceRequest}}</td>
                                        <td>
                                            <a href="{{url('/Support/Detail/'.$device->id)}}">
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