@extends('layouts.informathic2')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

<!-- custom delte button -->
<div id="myModal" class="modal fade">
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
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                
                  @if($brand)
                    <a href="{{url('/brand/delete/'.$brand->id)}}">
                        <button type="button" class="btn btn-danger">Handicapé</button>
                    </a>
                    @else
                    <a href="{{url('/brand/delete/')}}">
                        <button type="button" class="btn btn-danger">Handicapé</button>
                    </a>

				@endif
			</div>
		</div>
	</div>
</div> 
<!-- end custom delte button -->


<div class="row">
    <div class="col-12 text-center">
        <div class="dashboard_image">
            <h1 class="brand_device mt-5">Marque</h1> 
        </div>
    </div>
    <div class="col-lg-8 mt-3">
        <div class="card">
            <div class="card-body">
                <a href="{{url('brandPDF')}}">
                    <button type="button" class="btn btn-sm btn-success float-right my-1">Exporter PDF</button>
                </a>
                <table class="table table-bordered w-100 text-dark" id="users-table">
                    <thead class="card-header">
                        <tr>
                            <th>Identifiant</th>
                            <th>Nom</th>
                            <th>Statut</th>
                            <th>Créé à</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mt-3">
        <div class="card">
            <div class="card-header">
            Ajouter une nouvelle marque
            </div>
            <div class="card-body">
                <form action="{{url('config/brand/add')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1"><b>Nom de marque *</b></label>
                        <input type="text" name="product_name" class="form-control" >
                        @error('product_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <br>
                        <label for="exampleInputEmail1" class="mt-2"><b>Sélectionner une image *</b></label>
                        <input type="file" name="image" class="form-control" >
                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn next-step">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-2 mb-3">
        <a href="{{url('/configuration')}}">
            <button type="button" class="default-btn btn-block btn-secondary prev-step">
        Retour
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
        ajax: '{!! route('datatables.data') !!}',
        columnDefs:[
            {
                targets: 4,
                title:'Action',
                orderable:false,
                render: function(data,type,full,meta){
                    return ' <a class="btn btn-sm btn-primary" href="/brand/edit/'+full.id+'">Éditer </a> <a class="btn btn-sm btn-danger"  href="#myModal" class="trigger-btn" data-toggle="modal" onclick="return myFunction();" >Handicapé</a>'
                }
            }
        ],
        columns: [
            
            { data: 'id', name: 'id' },
            { data: 'product_name', name: 'product_name' },
            { data: 'disable', name: 'disable' },
            { data: 'created_at', name: 'created_at' },
        ]
    });
});
</script>

@endsection