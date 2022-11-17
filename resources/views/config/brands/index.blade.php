@extends('layouts.informathic2')
@section('content')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

<div class="row">
    <div class="col-12 text-center">
        <div class="dashboard_image">
            <h1 class="brand_device mt-5">Marque</h1> 
        </div>
    </div>
    <div class="col-lg-8 mt-3">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered w-100 text-dark" id="users-table">
                    <thead class="card-header">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created At</th>
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
                <form action="{{url('config/product/add')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom de marque *</label>
                        <input type="text" name="product_name" class="form-control" >
                        @error('product_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <label for="exampleInputEmail1" class="mt-2">Sélectionner une image *</label>
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
                targets: 3,
                title:'Action',
                orderable:false,
                render: function(data,type,full,meta){
                    return ' <a class="btn btn-sm btn-primary" href="/brand/edit/'+full.id+'">Edit </a> <a class="btn btn-sm btn-danger" href="/admission/delete/page/'+full.id+'">Delete</a>'
                }
            }
        ],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'product_name', name: 'product_name' },
            { data: 'created_at', name: 'created_at' },
        ]
    });
});
</script>
@endsection