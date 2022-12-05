@extends('layouts.informathic')
@section('content')

<style>


</style>

<div class="bg-white border rounded">
    <div class="card">
            <div class="card-body p-5">
                <section class="signup-step-container">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Assistance</i></a>
                                </li>
                                <li role="presentation" class="disabled" style="margin-left: -10%">
                                    <a href="#step2"  style="pointer-events: none; " data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Dispositif</i></a>
                                </li>
                                <li role="presentation" class="disabled" style="margin-left: -10%">
                                    <a href="#step3"   style="pointer-events: none; " data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Produit</i></a>
                                </li>
                                <li role="presentation" class="disabled"style="margin-left: 47%">
                                    <a href="#step4"   style="pointer-events: none; " data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>bénéficier à</i></a>
                                </li>

                                <li role="presentation" class="disabled" style="margin-left: 64%">
                                    <a href="#step5"   style="pointer-events: none; "  data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span> <i>Informations Complémentaires</i></a>
                                </li>

                                <li role="presentation" class="disabled" style="margin-left: 82%">
                                    <a href="#step6"   style="pointer-events: none; " data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span> <i>Votre choix de retour</i></a>
                                </li>

                                <li role="presentation" class="disabled" style="margin-left: 98%">
                                    <a href="#step7"   style="pointer-events: none; " data-toggle="tab" aria-controls="step7" role="tab"><span class="round-tab">7</span> <i>Sommaire</i></a>
                                </li>
                                
                            </ul>
                        </div>

                        <span class="d-none" id="userId">{{auth()->user()->id}}</span>
    

                            <div class="tab-content" id="main_form">


                            
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="row">
                                        <div class="col-md-12 text-left">
                                                <h3 class="text-dark text-center">Vous êtes intéressé par une réparation mais vous n'êtes pas à Montpellier ?</h3>
                                                <p class="text-center">nous pouvons procéder par email. simple et rapide en 5 étapes !</p>
                                                <!-- <h3>Comment ça se passe ?</h3> -->
                                                <ol class="mt-3 text-dark ">
                                                    <li>
                                                     Créer un compte
                                                    </li>
                                                    <li class="mt-1"> 
                                                    Faire une demande d'assistance : indiquer votre appareil, votre panne ou le service choisi, le choix du retour
                                                    </li>
                                                    <li class="mt-1">
                                                     Anotre feu vert !
                                                    </li>
                                                    <li class="mt-1">
                                                        Est-ce accepté ?
                                                        vous pouvez ensuite préparer votre colis, l'imprimer et y joindre le support reçu par email puis créer le bordereau d'expédition (frais de port à votre charge) et nous l'envoyer
                                                        par Colissimo, ou tout autre de votre choix, à l'exception de Chronopost à notre adresse Informathic

                                                    </li>
                                                    <li class="mt-1">
                                                    Dès réception du colis, nous vous informerons de sa réception par email. Une fois la réparation effectuée, vous pouvez régler votre facture (réparation + frais de retour)
                                                        via PayPa uniquement sur votre client
                                                    </li>
                                                </ol>

                                                <hr>
                                        </div>
                                        
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn next-step">Passez à l'étape suivante <i class="fa fa-long-arrow-right ml-2"></i></button></li>
                                    </ul>
                                </div>
                                



                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="text-dark">Choisissez votre marque <span class="text-secondary">(Sélectionnez n'importe quelle marque pour aller à la page suivante)</span></h3>
                                        </div>
                                    </div>
                                        <input type="hidden" class="BrandValue">
                                        <input type="hidden" class="BrandName">

                                    <div class="row mt-2 justify-content-center text-center">   
                                        @foreach($brands as $brand)
                                            <div class="col-md-3 col-sm-5  mt-5 image_col">
                                                <img class="img-fluid" src="{{$brand->image}}" alt="">
                                                <button type="button" class="btn btn-outline-primary btn-block  mt-3 brand_id" value="{{$brand->id}}"><b>{{$brand->product_name}}</b></button>
                                                
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-4">
                                            <button type="button" class="default-btn prev-step  btn-block btn-secondary">Retour</button>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <button type="button" class="default-btn go-step product_data btn-block btn-secondary">Prochain</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            
                                


                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <div class="row">
                                            <div class="col-12">
                                                <h3 class="text-dark">Choisissez votre produit <span class="text-secondary">(Sélectionnez n'importe quelle produit pour aller à la page suivante)</span></h3>
                                            </div>
                                    </div>
                                    <!-- Products  -->
                                    <input type="hidden" id="seriveData">
                                    <input type="hidden" id="seviceText">
                                    <div class="row mt-5 justify-content-center text-center select_product">
                                        <!-- here dynamically products add through controler -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-4">
                                            <button type="button" class="default-btn prev-step btn-block btn-secondary brand_null">Retour</button>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <button type="button" class="default-btn go-next service_data btn-block btn-secondary">Prochain</button>
                                        </div>
                                    </div>
                                </div>




                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <div class="row">
                                            <div class="col-12">
                                                <h3>Choisissez nos services (plusieurs choix possibles, à valider en cliquant sur suivant)</h3>
                                            </div>
                                    </div>

                                    <div class="row mt-5 justify-content-center text-center select_service">
                                        <!-- here we dynamicaly add services -->
                                    </div>
                                    <input type="hidden" id="benifitData">
                                    <input type="hidden" id="benifitDataText">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="default-btn prev-step btn-block btn-secondary hide_benifits hideServicebenifit">Retour</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="default-btn next-benifit btn-block btn-secondary ">Prochain</button>
                                        </div>
                                    </div>
                                </div>




                                <div class="tab-pane text-dark" role="tabpanel" id="step5">
                                    <div class="row text-center">
                                            <div class="col-12">
                                                <h3>Détails:</h3>
                                            </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 ">
                                            <h6 class="mt-3"><b>My Problem:</b></h6>
                                            <p class="mt-2">Description du problème ( être le plus précis possible)</p>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="" id="problemDetect" class="form-control mt-3" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <h6><b>Réparation antérieure : Si votre appareil a déjà été réparé, merci de nous indiquer la nature de la réparation</b></h6>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="" id="information" class="form-control mt-3" rows="2"></textarea>
                                        </div>
                                        <div class="col-md-6 mt-5">
                                            <h6><b>Mot de passe possible pour les ordinateurs/consoles (Pas de mot de passe nécessaire pour le contrôleur) </b></h6>
                                        </div>
                                        <div class="col-md-6 mt-5">
                                            <input type="text" id="returnChoice" class="form-control">
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <h6><b>Mot de passe NIP</b></h6>
                                            <div id="div2" class="selectGroup mt-2"></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <h6><b>MODÈLE de mot de passe</b></h6>
                                            <div id="div3" class="selectGroup mt-2"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text"  id="PassPin" class="form-control " >
                                        </div>
                                        <div class="col-lg-8 mt-2"> 
                                            <div id="PassPat" >
                                                <canvas id="mycanvas" width="350" height="350" class="glowing-border">
                                                </canvas>
                                                    <p id="pattern"> no </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="default-btn prev-step btn-block btn-secondary">Retour</button>

                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="default-btn next-step  btn-block btn-primary">Continuer</button>
                                        </div>
                                    </div>
                                </div>




                                <div class="tab-pane" role="tabpanel" id="step6">
                                    <div class="row text-center text-dark">
                                            <div class="col-12">
                                                <h3>Choix de retour:</h3>
                                            </div>
                                    </div>
                                    <div class="row mt-3 text-dark">
                                        <div class="col-md-6 ">
                                            <h6>Choix Envoyer Retour :</h6>
                                            <h6 class="mt-4"><b>Nous appliquons des rats d'affranchissement pour les envois de retour</b></h6>
                                            <h6 class="mt-3"><b>Sans signature R1, le facteur le livre directement
                                                à la boîte aux lettres. Attention en cas de perte, l'indemnisation est à hauteur de
                                                50$.</b></h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                    <div class="col-md-6 mt-5 text-dark">
                                        <h6 class="mt-3"><b>Pour R2, la compensation est jusqu'à 200$ et remise en main propre</b></h6>
                                    </div>
                                        <div class="col-md-6 mt-5">
                                            <select name="shipment" id="shipment" class="form-control" id="">
                                                <option value="R1(Envoyer un colis par la poste)">R1 (Envoyer un colis par la poste)</option>
                                                <option value="R2(Demander un rendez-vous pour prendre soin de l'appareil)">R2 (Demander un rendez-vous pour prendre soin de l'appareil)</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="default-btn prev-step btn-block btn-secondary">Retour</button>

                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="default-btn next-step  btn-block btn-primary">Continuer</button>
                                        </div>
                                    </div>
                                </div>




                                <div class="tab-pane text-dark" role="tabpanel" id="step7">
                                    <div class="row text-center">
                                            <div class="col-12">
                                                <h2 class="text-dark">Sommaire:</h2>
                                            </div> 
                                    </div>
                                    <table class="table mt-3">
                                        <thead>
                                            <tr  class="thead-custom">
                                            <th scope="col">#</th>
                                            <th scope="col">La description</th>
                                            <th scope="col">Informations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <th scope="row">1</th>
                                            <td><h6>Vos notes:</h6></td>
                                            <td><p id="putBrand">None</p></td>
                                            </tr>
                                            <tr>
                                            <th scope="row">2</th>
                                            <td><h6>Ton produit:</h6></td>
                                            <td><p id="putProduct">None</p></td>
                                            </tr>
                                            <tr>
                                            <th scope="row">3</th>
                                            <td><h6>Prestation demandée:</h6></td>
                                            <td><p id="putBenifit">None</p><p id="putPrice" >None</p></td>
                                            </tr>
                                            <tr>
                                            <th scope="row">4</th>
                                            <td> <h6>Informations complémentaires:</h6></td>
                                            <td> <p id="putproblemDetect">None</p></td>
                                            </tr>
                                            <tr>
                                            <th scope="row">5</th>
                                            <td> <h6>Problèmes détectés:</h6></td>
                                            <td> <p id="putInfo">None</p></td>
                                            </tr>
                                            <tr>
                                            <th scope="row">6</th>
                                            <td><h6>Adresse:</h6></td>
                                            <td><p class="text-dark" id="address">{{auth()->user()->name}}</p><br>
                                                                                    <p>{{auth()->user()->profile->postal}}</p><br>
                                                                                    <p>{{auth()->user()->profile->code}}</p><br>
                                                                                    <p>{{auth()->user()->profile->phone}}</p</td>
                                            </tr>
                                            <tr>
                                            <th scope="row">7</th>
                                            <td><h6>Votre choix de retour :</h6></td>
                                            <td><p id="putReturnChoice">None</p></td>
                                            </tr>
                                        </tbody>
                                        </table>

                                        <div class="col-md-12 text-center">
                                           
                                            <div class="alert alert-warning" role="alert">
                                                <p>Vous pouvez modifier votre adresse dans votre profil.</p>  
                                            </div>
                                            <div class="alert alert-danger" role="alert">
                                                <p>Attendez notre validation avant d'envoyer. Cela évite à tout le monde de perdre du temps et de l'argent.
                                                    Nous ne validons pas immédiatement les nouvelles demandes lorsque nous avons trop de demandes à traiter
                                                </p> 
                                            </div>                                   
                                        </div>
                                        
                                        
                                    <div class="row">
                                        <div class="col-md-6">
                                                <button type="button" class="default-btn btn-block btn-secondary prev-step">Retour</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button id="submitData" class="default-btn btn-block btn-success next-step">Envoyer un colis</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </div>
                                
                                
                             <div class="clearfix"></div>
                        </div>
                    </div>
                
                </section>

            </div>
        </div>
</div>
<script src="{{asset('admin/assets/js/PatternLock.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    function addItem(value,innerHTML) {
        document.getElementById('seriveData').value = value;
        document.getElementById("putProduct").innerHTML = innerHTML;
    }

    function addBenifit(value,innerHTML) {
        // alert(value)
        document.getElementById('benifitData').value=value;
        document.getElementById("benifitDataText").value = innerHTML;

        document.getElementById('putBenifit').innerHTML=value;
        document.getElementById("putPrice").innerHTML = innerHTML;
    }
    var e = document.getElementById('lock')
      var p = new pATTERN({
        onPattern:function(){
            this.success
        }
      })





    
    
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
     
      
    $(document).ready(function(){
        
    
        $(".brand_id").click(function(){
            var id = $(this).val();
            var name = $(this).text();
            $(".BrandValue").val(id);
            $("#putBrand").html(name);
        });
        $(".brand_null").click(function(){
            $(".BrandValue").val('');
            $(".seriveData").val('');
        });
        

        $(".product_data").click(function(){
            var id = $(".BrandValue").val();
            if(id.length == "")
                {
                    $("#p111").text("Le nom de famille est requis");
                    $("#id").focus();
                    return false;
                }
                else{
                    $.ajax({
                        url:'{{ url('/brand/fetach/data') }}',
                        type:'get',
                        data:{'id':id},
                        success:function(output_sub){
                            $('.select_product').html(output_sub);
                        }
                    });
                }
        });



        $(".service_data").click(function(){
            var value = $("#seriveData").val();
            if(value.length == "")
                {
                    $("#p111").text("Le nom de famille est requis");
                    $("#value").focus();
                    return false;
                }
                else{
                    $.ajax({
                    url:'{{ url('/product/fetach/data') }}',
                    type:'get',
                    data:{'value':value},
                    success:function(newOutput){
                        $('.select_service').html(newOutput);
                    }
                    });
                }
        });





        $(".next-benifit").click(function(){
            var value = $("#benifitData").val();
            if(value.length == "")
                {
                    $("#p111").text("Le nom de famille est requis");
                    $("#value").focus();
                    return false;
                }
                else{
                    return true;
                }
        });

        
        $(".hide_benifits").click(function(){
            $("#seriveData").val('');
        });
        $(".hideServicebenifit").click(function(){
            $("#benifitData").val('');
        });


        $("#problemDetect").keyup(function(){
            var problem = $(this).val();
            $('#putInfo').text(problem); 
        });


        $("#information").keyup(function(){
            var info = $(this).val();
            $('#putproblemDetect').text(info); 
        });

        $("#returnChoice").keyup(function(){
            var newchoice = $(this).val();
            $('#putReturnChoice').text(newchoice); 
        });


    // data submit using ajax
        $("#submitData").click(function () {

            var userId = $("#userId").text();
            var marks = $("#putBrand").text();
            var product = $("#putProduct").text();
            var service = $("#putBenifit").text();
            var information = $("#putInfo").text();
            var problem = $("#putproblemDetect").text();
            var price = $("#putPrice").text();
            var returnChoice = $("#putReturnChoice").text();
            var shipment = $("#shipment").val();
            var pin = $("#PassPin").val();
            var pattern = $("#pattern").text();

            $.ajax({
                    url:'{{ url('/insert/parcel')}}',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{'userId':userId,'marks':marks,'product':product,'service':service,
                        'information':information,'shipment':shipment,'problem':problem,'returnChoice':returnChoice,'price':price,
                        'pin':pin,'pattern':pattern,
                    },
                        success:function(success){
                            if(success){
                                window.location.href = '/public/SuccessParcel';
                            }             
                        }           
            });
        });
    });



    $(document).ready(function () {
        $('#PassPin').hide();
        $('#PassPat').hide();
        function toggleValueChanged(selectedValue) {
            console.log(selectedValue)
          if(selectedValue == '1'){
            $('#PassPin').hide();
          }
          else{
            $('#PassPin').show();
          }
        }

        function toggleValueChanged2(selectedValue) {
            console.log(selectedValue)
          if(selectedValue == '1'){
            $('#PassPat').hide();
          }
          else{
            $('#PassPat').show();
          }
        }



        let opt = [
          { value: 1, label: "No" },
          { value: 2, label: "Yes" },
        ];
        $("#div1").setupToggles();

        $("#div2").setupToggles({
          toggleOptions: opt,
          defaultValue: 1,
          onSelectedValueChange: toggleValueChanged,
        });

        $("#div3").setupToggles({
          toggleOptions: opt,
          defaultValue: 1,
          onSelectedValueChange: toggleValueChanged2,
        });
      });

   
</script>




 <!-- here is the passwrod patter -->
<script>	
    var dots=9
	var trues=new Array(dots);
	var rects=new Array(dots);
	var lines=[];
	var pattern=new Array(dots);
	var cpattern=new Array(dots);
	var ink="rgb(255,144,0)";
	var success="#8BDC50";
	var spaint="#03A9F4";
	var end,start,index=1,stroke=10;
	var startx,starty,endx,endy,enddx,enddy,width,height;
	var c,ctx,radius=10,ind;
	var timer,interval;
	var patternSet=false,settingPattern=false,patternCorrect=false,drawing=false;
	//////// Assign The Components Here //////////////
	var canvasid="#mycanvas";
	var changeBtnId="#change";
	var outputId="#pattern";

$(document).ready(function(){
	c=document.getElementById(canvasid.substr(1));
////////////////////////Assigning Event Listeners/////////////////////////////////////////
	$(changeBtnId).on('click',function(){
		settingPattern=true;
	});
	$(canvasid).on('mousedown',function(e){
		if(timer){
			clearTimeout(timer);
		}
		resetScreen();
		startx=e.offsetX;
		starty=e.offsetY;
		index=1;
		for(i=0;i<dots;++i){
			if(rects[i].contains(new Point(startx,starty))){
				startx=rects[i].getCenterX();
				starty=rects[i].getCenterY();
				endx=startx;
                endy=starty;
                trues[i]=true;
                pattern[i]=index;
                start=i;
                drawing=true;
                break;
			}
		}
	});
	$(canvasid).on('mouseup',function(e){
		drawing=false;
		printPattern();
		if(settingPattern==true){
			for(i=0;i<dots;++i){
				cpattern[i]=pattern[i];
			}
		}else{
			if(patternCheck()==true){
				patternCorrect=true;
			}
		}
		timer=setTimeout(function(){
			if(patternCorrect==true){
				clearInterval(interval);
			}
			settingPattern=false;
			patternCorrect=false;
			resetScreen();
		},1500);
	});
	$(canvasid).on('mousemove',function(e){
		if(drawing==true){
			endx=e.offsetX;
			endy=e.offsetY;
			for(i=0;i<rects.length;++i){
				if(trues[i]!=true){
					if(rects[i].contains(new Point(endx,endy))){
						index+=1;
						enddx=rects[i].getCenterX();
						enddy=rects[i].getCenterY();
						lines.push(new Line(startx, starty, enddx, enddy));
						startx=enddx;
						starty=enddy;
						end=i;
						if((start==0&&end==2)||(start==2&&end==0)){
							if(trues[1]==false){
                            trues[1]=true;pattern[1]=index;index+=1;}}
                        if((start==3&&end==5)||(start==5&&end==3)){
                            if(trues[4]==false){
                            trues[4]=true;pattern[4]=index;index+=1;}}
                        if((start==6&&end==8)||(start==8&&end==6)){
                            if(trues[7]==false){
                            trues[7]=true;pattern[7]=index;index+=1;}}
                        if((start==0&&end==6)||(start==6&&end==0)){
                            if(trues[3]==false){
                            trues[3]=true;pattern[3]=index;index+=1;}}
                        if((start==1&&end==7)||(start==7&&end==1)){
                            if(trues[4]==false){
                            trues[4]=true;pattern[4]=index;index+=1;}}
                        if((start==2&&end==8)||(start==8&&end==2)){
                            if(trues[5]==false){
                            trues[5]=true;pattern[5]=index;index+=1;}}
                        if((start==0&&end==8)||(start==8&&end==0)){
                            if(trues[4]==false){
                            trues[4]=true;pattern[4]=index;index+=1;}}
                        if((start==2&&end==6)||(start==6&&end==2)){
                            if(trues[4]==false){
                            trues[4]=true;pattern[4]=index;index+=1;}}
                            start=i;
                            trues[i]=true;
                            pattern[i]=index;
                            break;
                        }
                    }
                }
            }
	});

	//////////////////// Setting Interval For Repainting The Screen ///////////////////////////
	interval=setInterval(paint,25/2);
});

/**
* The Paint Function Draws The Dots
*/

function paint(){
	ctx=c.getContext("2d");
	width=c.width;
	height=c.height;
	ctx.clearRect(0,0,width,height);
	ctx.fillStyle="#0c1741";
	ctx.lineWidth=radius*2;
	ctx.lineJoin="round";
	ctx.lineCap="round";
	ctx.strokeStyle=ink;
	ctx.shadowColor = "rgb(0, 0, 0)"; 
	ctx.shadowBlur = radius/4;
	ctx.shadowOffsetX = 0;
	ctx.shadowOffsetY = 0;
	if(settingPattern==true){
		ctx.strokeStyle=spaint;
	}
	if(patternCorrect==true){
		ctx.strokeStyle=success;
	}
	for(i=0;i<lines.length;++i){
		lines[i].draw();
	}
	if(drawing==true){
		new Line(startx,starty,endx,endy).draw();
	}
	ind=0;
	for(i=width/6;i<width;i+=width/3){
		for(j=height/6;j<height;j+=height/3){
			fillCircle(i,j);
			if(trues[ind]==true){
				ctx.lineWidth=2;
				ctx.strokeStyle="red";
				strokeCircle(i,j);
			}
			rects[ind]=new Rectangle(i-radius,j-radius,radius*2,radius*2); 
			ind++;
		}
	}
}

/**
* This Function Resets The Pattern
*/

function resetScreen(){
	while(lines.length>0){
		lines.pop();
	}
	for(i=0;i<trues.length;++i){
		trues[i]=false;
		pattern[i]=0;
	}
}

/**
* Checks If The Pattern Is Correct Or Not
*@return Returns True If Pattern Is Correct Else False
*/

function patternCheck(){
	var correct=true;
	for(i=0;i<dots;++i){
		if(cpattern[i]!=pattern[i]){
			correct=false;
			break;
		}
	}
	return correct;
}

/**
* Prints The Pattern On The Component
*/

function printPattern(){
	$(outputId).html(pattern);
}

//////////////// The Line Class ////////////////////////
function Line(startx,starty,endx,endy){
	this.startx=startx;
	this.starty=starty;
	this.endx=endx;
	this.endy=endy;
	this.draw=function(){
		ctx.beginPath();
 		ctx.moveTo(this.startx,this.starty);
 		ctx.lineTo(this.endx,this.endy);
 		ctx.stroke();
 		ctx.closePath();
	}
}

/**
* It Draws And Fills The Circle With Centres(i,j)
*/

function fillCircle(i,j){
		ctx.beginPath();
 		ctx.arc(i,j,radius,(Math.PI/180)*0,(Math.PI/180)*360,false);
 		ctx.fill();
 		ctx.closePath();
}

/**
* It Draws The Circle With Centres(i,j)
*/

function strokeCircle(i,j){
		ctx.beginPath();
 		ctx.arc(i,j,radius*3,(Math.PI/180)*0,(Math.PI/180)*360,false);
 		ctx.stroke();
 		ctx.closePath();
}

/////////////// The Rectangle Class ////////////////////////////
function Rectangle(x,y,width,height){
	this.x=x;
	this.y=y;
	this.width=width;
	this.height=height;
	this.contains=function(point){
		if(point.x>=this.x&&point.x<=(this.x+this.width)&&point.y>=this.y&&point.y<=(this.y+this.height)){
			return true;
		}
		return false;
	}

	this.getCenterX=function(){
		return this.x+this.width/2;
	}

	this.getCenterY=function(){
		return this.y+this.height/2;
	}
}

/////////////// The Point Class //////////////////////////
function Point(x,y){
	this.x=x;
	this.y=y;
}
</script>
@endsection