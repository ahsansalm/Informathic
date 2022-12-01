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
                <div class="col-12 text-right">
                    <a href="{{url('userOrderPDF')}}">
                        <button type="button" class="btn btn-sm btn-success float-right mt-2">Exporter PDF</button>
                    </a>
                </div>
            <div class="card-body">
                <input type="text" class="form-control" id="searchOrder" placeholder="Ordre de recherche par nom d'utilisateur...">
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
                                    <th scope="col" class="text-white">Dispositif Statut</th>
                                    <th scope="col" class="text-white">Prix</th>
                                    <th scope="col" class="text-white">Remarques</th>
                                    <th scope="col" class="text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody id="orderSeaech">
                                @foreach($devices as $device)
                                    <form>
                                        <tr>
                                            <th scope="row"><b class="text-dark">{{$device->productId}}</b></th>
                                            <th scope="row" hidden><b class="text-dark">{{$device->id}}</b></th>
                                            <td><b>{{$device->user->firstname}} {{$device->user->lastname}} </b></td>
                                            <td><img src="{{$device->user->photo}}  " style="height: 30px; width 20px;" alt=""></td>
                                            <td><b class="text-dark">{{$device->product->marks}}</b></td>
                                            <td>{{$device->product->product}}</td>
                                            <td>{{$device->servicedata->service}}</td>
                                            @if($device->product->status =='Approuvé')
                                            <td><span class="badge bagde-sm bg-success">{{$device->product->status}}</span></td>
                                            @else
                                            <td><span class="badge bagde-sm bg-danger">{{$device->product->status}}</span></td>
                                            @endif

                                            @if($device->product->admin_status =='Appareil accepté')
                                            <td><span class="badge bagde-sm bg-dark">{{$device->product->admin_status}}</span></td>
                                            @elseif($device->product->admin_status =='Reçu')
                                            <td><span class="badge bagde-sm bg-primary">{{$device->product->admin_status}}</span></td>
                                            @elseif($device->product->admin_status =='en cours')
                                            <td><span class="badge bagde-sm bg-secondary">{{$device->product->admin_status}}</span></td>
                                            @elseif($device->product->admin_status =='SALLE DATTENTE')
                                            <td><span class="badge bagde-sm bg-warning">{{$device->product->admin_status}}</span></td>
                                            @elseif($device->product->admin_status =='Réparé')
                                            <td><span class="badge bagde-sm bg-primary">{{$device->product->admin_status}}</span></td>
                                            @elseif($device->product->admin_status =='Retour au client')
                                            <td><span class="badge bagde-sm bg-success">{{$device->product->admin_status}}</span></td>
                                            @else
                                            <td><span class="badge bagde-sm bg-danger">{{$device->product->admin_status}}</span></td>
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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
    // data submit using ajax
    $("#searchOrder").keyup(function () {
        var search = $(this).val();
        // console.log(search)
        $.ajax({
                    url: '{{ url('/search/order') }}',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{'search':search},
                        success:function(data){   
                            $('#orderSeaech').html(data);     
                        }           
        }); 
    }); 
});
</script>
@endsection
