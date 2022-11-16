@extends('layouts.informathic2')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="dashboard_image" style="background: #0A0A0B !important;">
                <h1 class="text-center mt-5">Ecrivez votre réponse</h1> 
            </div>
            <div class="card-body text-dark">
                    <div class="row  text-center mt-5">
                        <div class="col-3">
                            <h6>Informations de l'utilisateur:</h6>
                            <hr>
                        </div>
                        <div class="col-9">
                            <input type="hidden" id="update_id" value="{{ $supports->id }}"  >
                            <p id="userId"hidden ></span>{{$supports->profile->user_id}}</p>
                                <p id="putProduct"><span class="text-dark">Nom: </span>{{$supports->profile->firstname}},
                                <span class="text-dark">Adresse: </span>{{$supports->profile->address}}, 
                                <span class="text-dark">Code: </span>{{$supports->profile->code}},
                                <span class="text-dark">Téléphoner: </span>{{$supports->profile->phone}},</p>
                            <hr>
                        </div>
                        <br>
                        <br>

                        <div class="col-3">
                            <h6>Information produit:</h6>
                            <hr>
                        </div>
                        <div class="col-9">
                        <p id="productId" hidden>{{$supports->product->id}}</p>
                                <p id="putProduct"><span class="text-dark">Des marques: </span>{{$supports->product->marks}},
                                <span class="text-dark">Nom: </span>{{$supports->product->product}}, 
                                <span class="text-dark">Service: </span>{{$supports->product->serviceRequest}},
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
                                            <span class="form-control" id="object">{{$supports->object}}</span>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <h4>Message: *</h4>
                                            <p class="mt-2">Exemple : Voici le mot de passe que vous m'avez demandé</p>
                                        </div>
                                        <div class="col-md-6 mt-1">
                                        <span class="form-control" id="problem">{{$supports->problem}}</span>                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <h4>Icône: *</h4>
                                            <p class="mt-2">Icône pour illustrer l'idée de votre message</p>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <span class="form-control" id="icon">{{$supports->icon}}</span>
                                        </div>

                                        <div class="col-md-6 mt-5">
                                            <h4>Tapez votre réponse ici : *</h4>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <textarea name="" class="form-control"  id="answer" rows="3"></textarea>
                                        </div>
                                        
                                    </div>



                                    
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                    </div>
                      <div class="row">          
                            <div class="col-md-6">
                                <a href="{{url('/problem')}}">
                                    <button type="button" class="default-btn  btn-block prev-step">Retour</button>
                                </a>                                       
                            </div>
                            
                            
                              <div class="col-md-6">
                                <button id="sendReply" class="default-btn b   next-step btn-block ">Réponse</button>
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
    $("#sendReply").click(function () {
        var update_id = $("#update_id").val();
        var userId = $("#userId").text();
        var productId = $("#productId").html();
        var problem = $("#problem").text();
        var object = $("#object").text();
        var icon = $("#icon").text();
        var answer = $("#answer").val();
        $.ajax({
                    url: '{{ url('/problem/reply') }}',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{'update_id':update_id,'userId':userId,'productId':productId,'problem':problem,'object':object,'icon':icon,'answer':answer,},
                        success:function(success){   
                            if(success){
                                toastr.success(success.message,'Your answer has been send!');
                                window.location.href = '/public/problem';
                                
                            }              
                        }           
        }); 
    });
});
</script>
@endsection
