@extends('layouts.informathic')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
                <div class="dashboard_image" style="background: #0A0A0B !important;">
                    <h1 class="text-center mt-5">Detail:</h1> 
                </div>
           </div>
            <div class="card-body text-dark">

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
                                            <span class="form-control" id="object">{{$ProblemReply->object}}</span>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <h4>Message: *</h4>
                                            <p class="mt-2">Exemple : Voici le mot de passe que vous m'avez demandé</p>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <span class="form-control" id="object">{{$ProblemReply->problem}}</span>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <h4>Icône : *</h4>
                                            <p class="mt-2">Icône pour illustrer l'idée de votre message</p>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <span class="form-control" id="object">{{$ProblemReply->icon}}</span>
                                        </div>

                                        <div class="col-md-6 mt-5">
                                            <h4>
Réponse de l'administrateur :</h4>
                                        </div>
                                        <div class="col-md-6 mt-5">
                                            <span class="form-control" id="object"><b>{{$ProblemReply->answer}}</b></span>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{url('/notification')}}">
                                                <button type="button" class="default-btn  btn-block prev-step mt-5">Back</button>
                                            </a>
                                        </div>
                                        
                
                                    
                                </div>
                            </div>
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
        var userId = $("#userId").html();
        var productId = $("#productId").html();
        var problem = $("#problem").html();
        var object = $("#object").html();
        var icon = $("#icon").html();
        var answer = $("#answer").val();
        $.ajax({
                    url: '{{ url('/problem/reply') }}',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{'userId':userId,'productId':productId,'problem':problem,'object':object,'icon':icon,'answer':answer,},
                        success:function(success){   
                            if(success){
                                toastr.success(success.message,'Your answer has been send!');
                                window.location.href = '/problem';
                                
                            }              
                        }           
        }); 
    });
});
</script>
@endsection
