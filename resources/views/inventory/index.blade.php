@extends('layouts.informathic2')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<!-- custom delte button -->
<!-- <div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
				    <i class="fa fa-warning ml-2" style="font-size:48px;color:red"></i>
				</div>						
				<h4 class="modal-title w-100">Êtes-vous sûr?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Voulez-vous supprimer votre service ?</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                
                  
			</div>
		</div>
	</div>
</div>  -->
<!-- end custom delte button -->

<div class="row">
    <div class="col-12 text-center">
        <div class="dashboard_image">
            <h1 class="brand_device mt-5">Systeme d'inventaire</h1> 
        </div>
    </div>

    <div class="col-12 text-right">
         <a href="{{url('/inventory/add')}}">
            <button type="button" class="default-btn btn-secondary prev-step">
                Ajouter 
            </button>
         </a>
    </div>

    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered w-100 text-dark" id="users-table">
                    <thead class="card-header">
                        <tr>
                            <th>Identifiant</th>
                            <th>Service</th>
                            <th>Produit</th>
                            <th>Prix (€)</th>
                            <th>Créé à</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    <!-- <div class="col-md-2 mb-3">
        <a href="{{url('/configuration')}}">
            <button type="button" class="default-btn btn-block btn-secondary prev-step">
        Retour
    </div> -->
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
        ajax: '{!! route('services.data') !!}',
        columnDefs:[
            {
                targets: 5,
                title:'Action',
                orderable:false,
                render: function(data,type,full,meta){
                    return ' <a class="btn btn-sm btn-primary" href="/service/edit/'+full.id+'">Éditer </a> <a class="btn btn-sm btn-danger" href="#myModal" class="trigger-btn" data-toggle="modal" onclick="return myFunction();">Effacer</a>'
                }
            }
        ],
        columns: [
            
            { data: 'id', name: 'id' },
            { data: 'service', name: 'service' },
            { data: 'product_id', name: 'product_id' },
            { data: 'price', name: 'price' },
            { data: 'created_at', name: 'created_at' },
        ]
    });
});
$(function(){
        $("#select_product").change(function(){
            var product = $(this).val();
            console.log(product)
            $.ajax({
                url:'{{ url('/product/fetch/data') }}',
                type:'get',
                data:{'product':product},
                success:function(data){
                    $('.marksId').val(data.product_id);
                }
            });
         
        });
    });
</script>

@endsection