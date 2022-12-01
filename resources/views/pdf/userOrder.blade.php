<html>
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>PDF User</title>
        <!-- CSS only -->
        <style>

        </style>
    </head>
    <body>
              <div class="container-fluid" style="font-size: 15px;">
                <div class="row">
                    <div class="col-12">
                    <h4>Commande de l'utilisateur :</h4>
                        <table class="table-bordered text-center" style="width: 90%;">
                            <thead style="background: rgb(12, 23, 65);">
                                <tr>
                                    <th scope="col" class="text-white px-2">#</th>
                                    <th scope="col" class="text-white px-2">Nom d'utilisateur</th>
                                    <th scope="col" class="text-white px-2">Image utilisateur</th>
                                    <th scope="col" class="text-white px-2">Des marques</th>
                                    <th scope="col" class="text-white px-2">Produit</th>
                                    <th scope="col" class="text-white px-2">Demande de service</th>
                                    <th scope="col" class="text-white px-2">Statut</th>
                                    <th scope="col" class="text-white px-2">Dispositif Statut</th>
                                    <th scope="col" class="text-white px-2">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($devices as $device)
                                        <tr>
                                            <th scope="row"><b class=" px-2 text-dark">{{$device->productId}}</b></th>
                                            <th scope="row" hidden><b class=" px-2 text-dark">{{$device->id}}</b></th>
                                            <td class="px-2"><b>{{$device->user->firstname}} {{$device->user->lastname}} </b></td>
                                            <td class="py-2"><img src="{{$device->user->photo}}  " style="height: 30px; width 20px;" alt=""></td>
                                            <td><b class=" px-2 text-dark">{{$device->product->marks}}</b></td>
                                            <td>{{$device->product->product}}</td>
                                            <td>{{$device->product->serviceRequest}}</td>
                                            @if($device->product->status =='Approuvé')
                                            <td><span class=" px-2 text-white badge bagde-sm bg-success">{{$device->product->status}}</span></td>
                                            @else
                                            <td><span class=" px-2 text-white badge bagde-sm bg-danger">{{$device->product->status}}</span></td>
                                            @endif

                                            @if($device->product->admin_status =='Appareil accepté')
                                            <td><span class=" px-2 text-white badge bagde-sm bg-dark">{{$device->product->admin_status}}</span></td>
                                            @elseif($device->product->admin_status =='Reçu')
                                            <td><span class=" px-2 text-white badge bagde-sm bg-primary">{{$device->product->admin_status}}</span></td>
                                            @elseif($device->product->admin_status =='en cours')
                                            <td><span class=" px-2 text-white badge bagde-sm bg-secondary">{{$device->product->admin_status}}</span></td>
                                            @elseif($device->product->admin_status =='SALLE DATTENTE')
                                            <td><span class=" px-2 text-white badge bagde-sm bg-warning">{{$device->product->admin_status}}</span></td>
                                            @elseif($device->product->admin_status =='Réparé')
                                            <td><span class=" px-2 text-white badge bagde-sm bg-primary">{{$device->product->admin_status}}</span></td>
                                            @elseif($device->product->admin_status =='Retour au client')
                                            <td><span class=" px-2 text-white badge bagde-sm bg-success">{{$device->product->admin_status}}</span></td>
                                            @else
                                            <td><span class=" px-2 text-white badge bagde-sm bg-danger">{{$device->product->admin_status}}</span></td>
                                            @endif
                                            <td>{{$device->totalPrice}}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>          
    </body>
</html>