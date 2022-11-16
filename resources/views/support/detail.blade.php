@extends('layouts.informathic2')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="dashboard_image">
                <h1 class="text-center mt-5">Problème d'écriture</h1> 
            </div>
            <div class="card-body text-dark">
                    <div class="row  text-center mt-5">
                        <div class="col-3">
                            <h6>Vos notes:</h6>
                            <hr>
                        </div>
                        <div class="col-9">
                            <p  id="userId" hidden value="{{auth()->user()->id}}">{{auth()->user()->id}}</p>
                            <p id="productId" hidden value="{{$supports->id}}" name="productId" >{{$supports->id}}</p>
                            <p id="putBrand">{{$supports->marks}}</p>
                            <hr>
                        </div>
                        <br>
                        <br>

                        <div class="col-3">
                            <h6>Ton produit:</h6>
                            <hr>
                        </div>
                        <div class="col-9">
                            <p id="putProduct">{{$supports->product}}</p>
                            <hr>
                        </div>
                        <br>
                        <br>

                        <div class="col-3">
                            <h6>Prestation demandée:</h6>
                            <hr>
                        </div>
                        <div class="col-9">
                            <p id="putBenifit">{{$supports->serviceRequest}}</p>
                            <hr>
                        </div>
                        <br>
                        <br>

                    </div>




                    <div class="row">
                        <div class="col-12">
                            <div class="card dark">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Objet: *</h4>
                                            <p class="mt-2">Exemple : Mot de passe iPhone</p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="object">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <h4>Message: *</h4>
                                            <p class="mt-2">Exemple : Voici le mot de passe que vous m'avez demandé</p>
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <textarea name="" id="problem" class="form-control" cols="30" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <h4>Icône: *</h4>
                                            <p class="mt-2">Icône pour illustrer l'idée de votre message</p>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <select name="" class="form-control" id="icon">
                                                <option value="Message">Message</option>
                                                <option value="Question">Question</option>
                                                <option value="Happy">Happy</option>
                                                <option value="Transit">Transit</option>
                                                <option value="Unhappy">Unhappy</option>

                                            </select>
                                        </div>
                                    </div>



                                    
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>





                        <div class="col-md-6">         
                            <a href="{{url('/MySupport')}}">
                                <button type="button" class="btn btn-block prev-step">Retour</button>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <button type="button" id="sendPrblem" class="btn next-step btn-block">Envoyer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            
    </div>

     
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
    // data submit using ajax
    $("#sendPrblem").click(function () {
        var userId = $("#userId").text();
        var productId = $("#productId").text();
        var problem = $("#problem").val();
        var object = $("#object").val();
        var icon = $("#icon").val();
        $.ajax({
                    url: '{{ url('/support/add') }}',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{'userId':userId,'productId':productId,'problem':problem,'object':object,'icon':icon,},
                        success:function(success){   
                            if(success){
                                toastr.success(success.message,'Le problème a été envoyé!');
                                window.location.href = '/public/MySupport';
                                
                            }              
                        }           
        }); 
    });
});
</script>
@endsection
