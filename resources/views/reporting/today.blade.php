@extends('layouts.informathic2')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

<div class="row">
    <div class="col-12 text-center">
        <div class="dashboard_image">
            <h1 class="brand_device mt-5">Rapport d'aujourd'hui </h1> 
        </div>
    </div>
</div>

<div class="row my-3">
    

    <div class="col-md-4">
        <div class="card card_back-con">
            <div class="card-body ">
                <h4>Vente totale:<span class="badge bg-primary float-right">€</span></h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card_back-con">
            <div class="card-body ">
                <h5>Achat total: <span class="badge bg-danger float-right">€</span></h5>
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="card card_back-con">
            <div class="card-body ">
                <h4>Votre bénéfice: <span class="badge bg-success  float-right">€</span></h4>
            </div>
        </div>
    </div>

    <div class="col-12 mt-3">
        <table class="table table-bordered w-100 text-dark" id="users-table">
            <thead style="background: rgb(12, 23, 65);">
                <tr>
                    <th scope="col" class="text-white">#</th>
                    <th scope="col" class="text-white">Nom d'utilisateur</th>
                    <th scope="col" class="text-white">Des marques</th>
                    <th scope="col" class="text-white">Produit</th>
                    <th scope="col" class="text-white">Demande de service</th>
                    <th scope="col" class="text-white">Statut</th>
                    <th scope="col" class="text-white">Prix ​​de vente</th>
                    <th scope="col" class="text-white">Prix ​​d'achat</th>
                    <th scope="col" class="text-white">Date</th>
                </tr>
            </thead>
            
        </table>
    </div>

</div>


   
<script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('order.todday.data') !!}',
        columns: [
            
            { data: 'id', name: 'id' },
            { data: 'userId', name: 'userId' },
            { data: 'marks', name: 'marks' },
            { data: 'product', name: 'product'},
            { data: 'serviceRequest', name: 'serviceRequest.service' },
            { data: 'status', name: 'status' },
            { data: 'serviceRequest', name: 'serviceRequest.purchase_price' },
            { data: 'serviceRequest', name: 'serviceRequest.price'},
            { data: 'date', name: 'date'},
        ]
    });
});
</script>
@endsection