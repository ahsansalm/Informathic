@extends('layouts.informathic')
@section('content')
<?php $role = Auth::user()->role_as; ?>
    @if($role == 0)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="dashboard_image">
                        <h1 class="text-center mt-5">Votre Espace Client</h1> 
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-center">Mon dernier document disponible</h3>
                        <hr>

                        <h5 class="text-dark">Mes 5 dernières citations <a href="{{url('/MyQuotes')}}"><span class="text-success">( voir mes devis )</span></a></h5>
                            <table class="table mt-2">
                                <thead style="background: rgb(12, 23, 65);">
                                    <tr>
                                        <th scope="col" class="text-white">#</th>
                                        <th scope="col" class="text-white">Des marques</th>
                                        <th scope="col" class="text-white">Produit</th>
                                        <th scope="col" class="text-white">Demande de service</th>
                                        <th scope="col" class="text-white">Quête d'état</th>
                                        <th scope="col" class="text-white">Prix</th>
                                        <th scope="col" class="text-white" style="width: 80px;">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php($i=1)
                                        @foreach($quotes as $device)
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
                    <!-- invoices -->
                        <hr>
                        <h5 class="text-dark">Mes 5 dernières factures <a href="{{url('/MyBill')}}"><span class="text-success">( voir mes factures )</a></span></h5>
                            <table class="table mt-2">
                                <thead style="background: rgb(12, 23, 65);">
                                    <tr>
                                        <th scope="col" class="text-white">#</th>
                                        <th scope="col" class="text-white">Titre</th>
                                        <th scope="col" class="text-white">Prix ​​total</th>
                                        <th scope="col" class="text-white">Date</th>
                                        <th scope="col" class="text-white">Statut</th>
                                        <th scope="col" class="text-white" style="width: 80px;">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <th scope="row"><b class="text-dark">{{$i++}}</b></th>
                                            <td>{{$invoice->product->product}}</td>
                                            <td><b class="text-dark">{{$invoice->totalPrice}}</b></td>
                                            <td>{{$invoice->date}}</td>
                                            @if($invoice->status =='Approved')
                                            <td><span class="badge badge-success">{{$invoice->status}}</span></td>
                                            @else
                                            <td><span class="badge badge-danger">{{$invoice->status}}</span></td>
                                            @endif                                            
                                            <td>
                                                    <a href="{{url('/Mybill/Detail/'.$invoice->id)}}">
                                                        <button type="button" class="btn btn-outline-primary btn-sm"><i style="font-size: 16px;" class="fa fa-eye pl-2"></i></button>
                                                    </a>
                                                    <!-- <div class="btn-group ml-1" role="group">
                                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        More Options
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <a class="dropdown-item text-danger" href=""><i class="fa fa-trash-o"></i>Delete</a>
                                                        </div>
                                                    </div> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    <!-- supports -->
                        <hr>
                        <h5 class="text-dark">Mes 5 derniers soutiens <a href="{{url('/notification')}}"><span class="text-success">( voir mes supports )</span></a></h5>
                            <table class="table mt-2">
                                <thead style="background: rgb(12, 23, 65);">
                                    <tr>
                                        <th scope="col" class="text-white">#</th>
                                        <th scope="col" class="text-white">Titre</th>
                                        <th scope="col" class="text-white">Produit</th>
                                        <th scope="col" class="text-white">bénéficier à</th>
                                        <th scope="col" class="text-white">Statut</th>
                                        <th scope="col" class="text-white">Date de la demande</th>
                                        <th scope="col" class="text-white" >Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($ProblemReply as $device)
                                        <tr>
                                            <th scope="row"><b class="text-dark">{{$i++}}</b></th>
                                            <td><b class="text-dark">{{$device->product->marks}}</b></td>
                                            <td>{{$device->product->product}}</td>
                                            <td>{{$device->product->serviceRequest}}</td>
                                            @if($device->status =='new')
                                            <td><span class="badge bg-danger">{{$device->status}}</span></td>    
                                            @else
                                            <td><span class="badge bg-success">{{$device->status}}</span></td>    
                                            @endif
                                            <td>{{$device->created_at}}</td>
                                            <td>
                                                <a href="{{url('/notification/detail/'.$device->id)}}">
                                                    <button type="button" class="btn btn-primary btn-sm">Suite</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach  
                                </tbody>
                            </table>

                    <!-- order -->
                        <hr>
                        <h5 class="text-dark">Mes 5 dernières commandes <a href="{{url('/MyOrder')}}"><span class="text-success">( voir mes commandes )</span></a></h5>
                            <table class="table mt-2">
                                <thead style="background: rgb(12, 23, 65);">
                                    <tr>
                                        <th scope="col" class="text-white">#</th>
                                        <th scope="col" class="text-white">Des marques</th>
                                        <th scope="col" class="text-white">Produit</th>
                                        <th scope="col" class="text-white">Demande de service</th>
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
    @else
    <div class="row">
        </div>
            <div class="col-12">
                <div class="card">
                   <div class="row text-center">
                        <div class="col-12">
                            <div class="dashboard_image">
                                <h1 class="brand_device mt-5">Tous les utilisateurs</h1> 
                            </div>
                            
                        </div>
                   </div>
                   
                    <div class="card-body">
                    <!-- users -->
                    <h3 class="card-title text-center">Nombre total d'utilisateurs : <span class="badge bg-success">{{$totalUsers}}</span> </h3>
                        <hr>
                            <table class="table mt-2">
                                <thead style="background: rgb(12, 23, 65);">
                                    <tr>
                                        <th scope="col" class="text-white">#</th>
                                        <th scope="col" class="text-white">Photo</th>
                                        <th scope="col" class="text-white">Prénom</th>
                                        <th scope="col" class="text-white">Nom de famille</th>
                                        <th scope="col" class="text-white">E-mail</th>
                                        <th scope="col" class="text-white">Address</th>
                                        <th scope="col" class="text-white">Téléphoner</th>
                                        <th scope="col" class="text-white">Statut</th>
                                        <th scope="col" class="text-white" style="width: 80px;">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($users as $user)
                                    <tr>
                                        <th scope="row"><b class="text-dark">{{$i++}}</b></th>
                                        <td><img src="{{$user->profile->photo}}" style="height: 30px; width 20px;" alt=""></td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->profile->lastname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->profile->address}}</td>
                                        <td>{{$user->profile->phone}}</td>
                                        <td>{{$user->profile->status}}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger btn-sm">Handicapé</button>
                                        </td>
                                    </tr>
                                    @endforeach()
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection