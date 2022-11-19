@extends('layouts.informathic')
@section('content')
<style>
    .img-fluid{
        height: 120px;
    }
    .img-fluid2{
        height: 140px;
    }
    .img-fluid3{
        height: 230px;
    }
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
                                            <h3>Choisissez votre marque</h3>
                                        </div>
                                    </div>
                                    <div class="row mt-5 justify-content-center text-center">   
                                    <input type="text" class="BrandValue">
                                        @foreach($brands as $brand)
                                            <div class="col-md-3 col-sm-5  mt-5 image_col">
                                                <img class="img-fluid" src="{{$brand->image}}" alt="">
                                                <button type="button" class="btn btn-outline-primary btn-block  mt-3 brand_id" value="{{$brand->id}}"><b>{{$brand->product_name}}</b></button>
                                                
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-4">
                                            <button type="button" class="default-btn prev-step btn-block btn-secondary">Retour</button>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <button type="button" class="default-btn next-step btn-block btn-secondary">Prochain</button>
                                        </div>
                                    </div>
                                    
                                </div>
                                




                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <div class="row">
                                            <div class="col-12">
                                                <h3>Choisissez votre produit</h3>
                                            </div>
                                    </div>
                                    <!-- Products  -->
                                    <div class="row mt-5 justify-content-center text-center select_product">
                                        <!-- here dynamically products add through controler -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mt-4">
                                            <button type="button" class="default-btn prev-step btn-block btn-secondary hide_comp_science">Retour</button>

                                        </div>
                                    </div>
                                </div>


                               




                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <div class="row">
                                            <div class="col-12">
                                                <h3>Choisissez nos services (plusieurs choix possibles, à valider en cliquant sur suivant)</h3>
                                            </div>
                                    </div>

                                    <div class="row mt-5 justify-content-center text-center ">
                                        <!-- here we dynamicaly add services -->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <button type="button" class="default-btn prev-step btn-block btn-secondary hide_benifits">Retour</button>

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
                                            <input type="text" id="" class="form-control">
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
<script>
    function addItem(value) {
        console.log(value);

        $.ajax({
                url:'{{ url('/product/fetach/data') }}',
                type:'get',
                data:{'value':value},
                success:function(output_sub){
                    $('.select_service').html(output_sub);
                }
            });
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        
    
        $(".brand_id").click(function(){
            var id = $(this).val();
            $(".BrandValue").val(id);
           
            $.ajax({
                url:'{{ url('/brand/fetach/data') }}',
                type:'get',
                data:{'id':id},
                success:function(output_sub){
                    $('.select_product').html(output_sub);
                }
            });
        });










        // hide all entrires
        $(".sony").css("display", "none");
        $(".nintendo").css("display", "none");
        $(".microsoft").css("display", "none");
        $(".stuf").css("display", "none");
        $(".nacon").css("display", "none");
        $(".razer").css("display", "none");
        $(".computer").css("display", "none");
        $(".blue").css("display", "none");
        $(".kobo").css("display", "none");
        $(".ps4_fat").css("display", "none");
        $(".ps4_slim").css("display", "none");
        $(".ps4_pro").css("display", "none");
        $(".dual_shock").css("display", "none");
        $(".ps_5").css("display", "none");
        $(".dual_sense").css("display", "none");
        $(".n_switch").css("display", "none");
        $(".n_switch_lite").css("display", "none");
        $(".new_switch").css("display", "none");
        $(".OLED").css("display", "none");
        $(".OLED100").css("display", "none");
        $(".OLED200").css("display", "none");
        $(".xbox_fat").css("display", "none");
        $(".mac2Aab").css("display", "none");
        $(".mac2Aa").css("display", "none");

        $(".mac2Ac").css("display", "none");
        $(".mac2Ad").css("display", "none");
        $(".mac2Ae").css("display", "none");
        $(".mac2Af").css("display", "none");
        $(".mac2Af7").css("display", "none");
        $(".mac2Af8").css("display", "none");
        $(".mac2Af9").css("display", "none");
        
        
        $(".xbox_onex").css("display", "none");
        $(".xbox_ones").css("display", "none");
        $(".xbox_oneElite").css("display", "none");
        $(".xbox_one_new").css("display", "none");
        $(".xbox_series_x").css("display", "none");
        $(".xbox_v2").css("display", "none");
        $(".xbox_s_n_x").css("display", "none");
        $(".xbox_series_new_s").css("display", "none");
        $(".scuf_infinit").css("display", "none");
        $(".scuf_impact").css("display", "none");
        $(".scuf_manete").css("display", "none");
        $(".scuf_prestige").css("display", "none");
        $(".scuf_slr").css("display", "none");
        $(".nacon_revol").css("display", "none");
        $(".razer_raizu").css("display", "none");
        $(".computer_comp").css("display", "none");
        $(".computer_lap").css("display", "none");
        $(".computer_win").css("display", "none");
        $(".blue_micro").css("display", "none");
        $(".kobo_reader").css("display", "none");
        $(".kobo_aurora").css("display", "none");
        
        
        
        

        // click product
            $(".click_sony").click(function () {
                $(".sony").css("display", "block");
                var click_sony = $(this).val();
                $("#putBrand").html(click_sony);
            });
            $(".click_nin").click(function () {
                $(".nintendo").css("display", "block");
                var click_nin = $(this).val();
                $("#putBrand").html(click_nin);
            });
            $(".click_mic").click(function () {
                $(".microsoft").css("display", "block");
                var click_mic = $(this).val();
                $("#putBrand").html(click_mic);
            });
            $(".click_stuf").click(function () {
                $(".stuf").css("display", "block");
                var click_stuf = $(this).val();
                $("#putBrand").html(click_stuf);
            });
            $(".click_nacon").click(function () {
                $(".nacon").css("display", "block");
                var click_nacon = $(this).val();
                $("#putBrand").html(click_nacon);
            });
            $(".click_razer").click(function () {
                $(".razer").css("display", "block");
                var click_razer = $(this).val();
                $("#putBrand").html(click_razer);
            });
            $(".click_comp").click(function () {
                $(".computer").css("display", "block");
                var click_comp = $(this).val();
                $("#putBrand").html(click_comp);
            });
            $(".click_blue").click(function () {
                $(".blue").css("display", "block");
                var click_blue = $(this).val();
                $("#putBrand").html(click_blue);
            });
            $(".click_kobo").click(function () {
                $(".kobo").css("display", "block");
                var click_kobo = $(this).val();
                $("#putBrand").html(click_kobo);
            });

        // sony product
            $(".click_ps4_fat").click(function () {
                $(".ps4_fat").css("display", "block");
                var click_ps4_fat = $(this).val();
                $("#putProduct").html(click_ps4_fat);

            });
            $(".click_ps4_slim").click(function () {
                $(".ps4_slim").css("display", "block");
                var click_ps4_slim = $(this).val();
                $("#putProduct").html(click_ps4_slim);
            });
            $(".click_ps4_pro").click(function () {
                $(".ps4_pro").css("display", "block");
                var click_ps4_pro = $(this).val();
                $("#putProduct").html(click_ps4_pro);
            });
            $(".click_dualshock").click(function () {
                $(".dual_shock").css("display", "block");
                var click_dualshock = $(this).val();
                $("#putProduct").html(click_dualshock);
            });
            $(".click_ps5").click(function () {
                $(".ps_5").css("display", "block");
                var click_ps5 = $(this).val();
                $("#putProduct").html(click_ps5);
            });
            $(".click_dualsense").click(function () {
                $(".dual_sense").css("display", "block");
                var click_dualsense = $(this).val();
                $("#putProduct").html(click_dualsense);
            });


        // nintendo click product
            $(".click_nswitch").click(function () {
                $(".n_switch").css("display", "block");
                var click_nswitch = $(this).val();
                $("#putProduct").html(click_nswitch);
            });
            $(".click_nswitchLite").click(function () {
                $(".n_switch_lite").css("display", "block");
                var click_nswitchLite = $(this).val();
                $("#putProduct").html(click_nswitchLite);
            });
            $(".click_newswitch").click(function () {
                $(".new_switch").css("display", "block");
                var click_newswitch = $(this).val();
                $("#putProduct").html(click_newswitch);
            });
            $(".click_oed").click(function () {
                $(".OLED").css("display", "block");
                var click_oed = $(this).val();
                $("#putProduct").html(click_oed);
            });

            $(".click_oed1").click(function () {
                $(".OLED100").css("display", "block");
                var click_oed = $(this).val();
                $("#putProduct").html(click_oed);
            });
            $(".click_oed2").click(function () {
                $(".OLED200").css("display", "block");
                var click_oed = $(this).val();
                $("#putProduct").html(click_oed);
            });


        // microsoft product 
            $(".click_xboxfat").click(function () {
                $(".xbox_fat").css("display", "block");
                var click_xboxfat = $('this').val();
                $("#putProduct").html(click_xboxfat);
            });
            $(".click_xboxX").click(function () {
                $(".xbox_onex").css("display", "block");
                var click_xboxX = $(this).val();
                $("#putProduct").html(click_xboxX);
            });
            $(".click_xboxS").click(function () {
                $(".xbox_ones").css("display", "block");
                var click_xboxS = $(this).val();
                $("#putProduct").html(click_xboxS);
            });
            $(".click_xboxElite").click(function () {
                $(".xbox_oneElite").css("display", "block");
                var click_xboxElite = $(this).val();
                $("#putProduct").html(click_xboxElite);
            });
            $(".click_xbox_one_new").click(function () {
                $(".xbox_one_new").css("display", "block");
                var click_xbox_one_new = $(this).val();
                $("#putProduct").html(click_xbox_one_new);
            });
            $(".click_series_x").click(function () {
                $(".xbox_series_x").css("display", "block");
                var click_series_x = $(this).val();
                $("#putProduct").html(click_series_x);
            });
            $(".click_xbox_v2").click(function () {
                $(".xbox_v2").css("display", "block");
                var click_xbox_v2 = $(this).val();
                $("#putProduct").html(click_xbox_v2);
            });
            $(".click_xbox_s_n_x").click(function () {
                $(".xbox_s_n_x").css("display", "block");
                var click_xbox_s_n_x = $(this).val();
                $("#putProduct").html(click_xbox_s_n_x);
            });
            $(".click_xbox_series_new_s").click(function () {
                $(".xbox_series_new_s").css("display", "block");
                var click_xbox_series_new_s = $(this).val();
                $("#putProduct").html(click_xbox_series_new_s);
            });


    // iphone ecran button dispay none
    $("#ecran1").css("display", "none");
    $("#ecran2").css("display", "none");
    $("#ecran3").css("display", "none");
    $("#ecran4").css("display", "none");
    $("#ecran5").css("display", "none");
    $("#ecran6").css("display", "none");
    $("#ecran7").css("display", "none");
    $("#ecran8").css("display", "none");
    $("#ecran9").css("display", "none");
    $("#ecran10").css("display", "none");
    $("#ecran11").css("display", "none");
    $("#ecran12").css("display", "none");
    $("#ecran13").css("display", "none");
    $("#ecran14").css("display", "none");
    $("#ecran15").css("display", "none");
     // iphone battery button dispay none
    $("#bat1").css("display", "none");
    $("#bat2").css("display", "none");
    $("#bat3").css("display", "none");
    $("#bat4").css("display", "none");
    $("#bat5").css("display", "none");
    $("#bat6").css("display", "none");
    $("#bat7").css("display", "none");
    $("#bat8").css("display", "none");
    $("#bat9").css("display", "none");
    $("#bat10").css("display", "none");
    $("#bat11").css("display", "none");
    $("#bat12").css("display", "none");
    $("#bat13").css("display", "none");
    $("#bat14").css("display", "none");
    $("#bat15").css("display", "none");

    // iphone chai
    $("#chai1").css("display", "none");
    $("#chai2").css("display", "none");
    $("#chai3").css("display", "none");
    $("#chai4").css("display", "none");
    $("#chai5").css("display", "none");
    $("#chai6").css("display", "none");
    $("#chai7").css("display", "none");
    $("#chai8").css("display", "none");
    $("#chai9").css("display", "none");
    $("#chai10").css("display", "none");
    $("#chai11").css("display", "none");
    $("#chai12").css("display", "none");
    $("#chai13").css("display", "none");
    $("#chai14").css("display", "none");
    $("#chai15").css("display", "none");
         // cam
         $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");



       
            $(".click_scuf_inf").click(function () {
                $(".scuf_infinit").css("display", "block");
            });
             // iphon 1
            $("#i11P").click(function () {
                $("#ecran1").css("display", "block");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");
                
                // bat
                $("#bat1").css("display", "block");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "block");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "block");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "block");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "block");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "block");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "block");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "block");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "block");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "block");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "block");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");

                


            });
            // iphone 2
            $("#i11").click(function () {
                $("#cam1").css("display", "none");
                $("#ecran2").css("display", "block");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "block");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "block");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "block");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "block");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "block");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "block");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "block");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "block");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "block");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "block");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "block");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 3
            $("#iXsM").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "block");


                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "block");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "block");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "block");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "block");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "block");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "block");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "block");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "block");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "block");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "block");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "block");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 4
            $("#iXS").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "block");


                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "block");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "block");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "block");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "block");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "block");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "block");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "block");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "block");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "block");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "block");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "block");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 5
            $("#iXR").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "block");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");  
                
                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "block");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "block");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "block");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "block");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "block");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "block");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "block");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "block");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "block");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "block");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "block");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 6
            $("#iX").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "block");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "block");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "block");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "block");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "block");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "block");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "block");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "block");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "block");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "block");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "block");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "block");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 7
            $("#i8p").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "block");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "block");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "block");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "block");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "block");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "block");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "block");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "block");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "block");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "block");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "block");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "block");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 8
            $("#i8").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "block");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "block");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "block");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "block");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "block");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "block");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "block");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "block");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "block");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "block");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "block");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "block");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 9
            $("#i7p").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "block");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "block");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "block");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "block");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "block");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "block");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "block");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panrnone
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "block");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "block");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "block");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 10
            $("#i7").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "block");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "block");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "block");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "block");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "block");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "block");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "block");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "block");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "block");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "block");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "block");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "block");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 11
            $("#i6sp").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "block");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "block");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "block");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "block");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "block");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "block");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "block");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "block");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "block");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "block");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "block");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "block");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 12
            $("#i6s").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "block");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "block");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "block");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "block");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "block");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "block");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "block");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "block");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "block");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "block");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "block");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "block");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 13
            $("#i6p").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "block");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "block");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "block");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "block");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "block");
                $("#des14").css("display", "none");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "block");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "block");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "block");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "block");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "block");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "block");
                $("#err14").css("display", "none");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "block");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "none");
            });
            // iphone 14
            $("#i6").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "block");
                $("#ecran15").css("display", "none");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "block");
                $("#bat15").css("display", "none");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "block");
                $("#chai15").css("display", "none");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "block");
                $("#cam15").css("display", "none");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "block");
                $("#des15").css("display", "none");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "block");
                $("#pan15").css("display", "none");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "block");
                $("#pane15").css("display", "none");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "block");
                $("#panne15").css("display", "none");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "block");
                $("#pand15").css("display", "none");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "block");
                $("#panr15").css("display", "none");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "block");
                $("#err15").css("display", "none");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "block");
                $("#rec15").css("display", "none");
            });
            // iphone 15
            $("#i5").click(function () {
                $("#ecran1").css("display", "none");
                $("#ecran2").css("display", "none");
                $("#ecran3").css("display", "none");
                $("#ecran4").css("display", "none");
                $("#ecran5").css("display", "none");
                $("#ecran6").css("display", "none");
                $("#ecran7").css("display", "none");
                $("#ecran8").css("display", "none");
                $("#ecran9").css("display", "none");
                $("#ecran10").css("display", "none");
                $("#ecran11").css("display", "none");
                $("#ecran12").css("display", "none");
                $("#ecran13").css("display", "none");
                $("#ecran14").css("display", "none");
                $("#ecran15").css("display", "block");

                // bat
                $("#bat1").css("display", "none");
                $("#bat2").css("display", "none");
                $("#bat3").css("display", "none");
                $("#bat4").css("display", "none");
                $("#bat5").css("display", "none");
                $("#bat6").css("display", "none");
                $("#bat7").css("display", "none");
                $("#bat8").css("display", "none");
                $("#bat9").css("display", "none");
                $("#bat10").css("display", "none");
                $("#bat11").css("display", "none");
                $("#bat12").css("display", "none");
                $("#bat13").css("display", "none");
                $("#bat14").css("display", "none");
                $("#bat15").css("display", "block");

                 // chai
                 $("#chai1").css("display", "none");
                $("#chai2").css("display", "none");
                $("#chai3").css("display", "none");
                $("#chai4").css("display", "none");
                $("#chai5").css("display", "none");
                $("#chai6").css("display", "none");
                $("#chai7").css("display", "none");
                $("#chai8").css("display", "none");
                $("#chai9").css("display", "none");
                $("#chai10").css("display", "none");
                $("#chai11").css("display", "none");
                $("#chai12").css("display", "none");
                $("#chai13").css("display", "none");
                $("#chai14").css("display", "none");
                $("#chai15").css("display", "block");


                // cam
                $("#cam1").css("display", "none");
                $("#cam2").css("display", "none");
                $("#cam3").css("display", "none");
                $("#cam4").css("display", "none");
                $("#cam5").css("display", "none");
                $("#cam6").css("display", "none");
                $("#cam7").css("display", "none");
                $("#cam8").css("display", "none");
                $("#cam9").css("display", "none");
                $("#cam10").css("display", "none");
                $("#cam11").css("display", "none");
                $("#cam12").css("display", "none");
                $("#cam13").css("display", "none");
                $("#cam14").css("display", "none");
                $("#cam15").css("display", "block");


                // des
                $("#des1").css("display", "none");
                $("#des2").css("display", "none");
                $("#des3").css("display", "none");
                $("#des4").css("display", "none");
                $("#des5").css("display", "none");
                $("#des6").css("display", "none");
                $("#des7").css("display", "none");
                $("#des8").css("display", "none");
                $("#des9").css("display", "none");
                $("#des10").css("display", "none");
                $("#des11").css("display", "none");
                $("#des12").css("display", "none");
                $("#des13").css("display", "none");
                $("#des14").css("display", "none");
                $("#des15").css("display", "block");

                  // pan
                  $("#pan1").css("display", "none");
                $("#pan2").css("display", "none");
                $("#pan3").css("display", "none");
                $("#pan4").css("display", "none");
                $("#pan5").css("display", "none");
                $("#pan6").css("display", "none");
                $("#pan7").css("display", "none");
                $("#pan8").css("display", "none");
                $("#pan9").css("display", "none");
                $("#pan10").css("display", "none");
                $("#pan11").css("display", "none");
                $("#pan12").css("display", "none");
                $("#pan13").css("display", "none");
                $("#pan14").css("display", "none");
                $("#pan15").css("display", "block");


                // pane
                $("#pane1").css("display", "none");
                $("#pane2").css("display", "none");
                $("#pane3").css("display", "none");
                $("#pane4").css("display", "none");
                $("#pane5").css("display", "none");
                $("#pane6").css("display", "none");
                $("#pane7").css("display", "none");
                $("#pane8").css("display", "none");
                $("#pane9").css("display", "none");
                $("#pane10").css("display", "none");
                $("#pane11").css("display", "none");
                $("#pane12").css("display", "none");
                $("#pane13").css("display", "none");
                $("#pane14").css("display", "none");
                $("#pane15").css("display", "block");


                 // panne
                 $("#panne1").css("display", "none");
                $("#panne2").css("display", "none");
                $("#panne3").css("display", "none");
                $("#panne4").css("display", "none");
                $("#panne5").css("display", "none");
                $("#panne6").css("display", "none");
                $("#panne7").css("display", "none");
                $("#panne8").css("display", "none");
                $("#panne9").css("display", "none");
                $("#panne10").css("display", "none");
                $("#panne11").css("display", "none");
                $("#panne12").css("display", "none");
                $("#panne13").css("display", "none");
                $("#panne14").css("display", "none");
                $("#panne15").css("display", "block");

                // pand
                $("#pand1").css("display", "none");
                $("#pand2").css("display", "none");
                $("#pand3").css("display", "none");
                $("#pand4").css("display", "none");
                $("#pand5").css("display", "none");
                $("#pand6").css("display", "none");
                $("#pand7").css("display", "none");
                $("#pand8").css("display", "none");
                $("#pand9").css("display", "none");
                $("#pand10").css("display", "none");
                $("#pand11").css("display", "none");
                $("#pand12").css("display", "none");
                $("#pand13").css("display", "none");
                $("#pand14").css("display", "none");
                $("#pand15").css("display", "block");


                // panr
                $("#panr1").css("display", "none");
                $("#panr2").css("display", "none");
                $("#panr3").css("display", "none");
                $("#panr4").css("display", "none");
                $("#panr5").css("display", "none");
                $("#panr6").css("display", "none");
                $("#panr7").css("display", "none");
                $("#panr8").css("display", "none");
                $("#panr9").css("display", "none");
                $("#panr10").css("display", "none");
                $("#panr11").css("display", "none");
                $("#panr12").css("display", "none");
                $("#panr13").css("display", "none");
                $("#panr14").css("display", "none");
                $("#panr15").css("display", "block");

                // err
                $("#err1").css("display", "none");
                $("#err2").css("display", "none");
                $("#err3").css("display", "none");
                $("#err4").css("display", "none");
                $("#err5").css("display", "none");
                $("#err6").css("display", "none");
                $("#err7").css("display", "none");
                $("#err8").css("display", "none");
                $("#err9").css("display", "none");
                $("#err10").css("display", "none");
                $("#err11").css("display", "none");
                $("#err12").css("display", "none");
                $("#err13").css("display", "none");
                $("#err14").css("display", "none");
                $("#err15").css("display", "block");



                // rec
                $("#rec1").css("display", "none");
                $("#rec2").css("display", "none");
                $("#rec3").css("display", "none");
                $("#rec4").css("display", "none");
                $("#rec5").css("display", "none");
                $("#rec6").css("display", "none");
                $("#rec7").css("display", "none");
                $("#rec8").css("display", "none");
                $("#rec9").css("display", "none");
                $("#rec10").css("display", "none");
                $("#rec11").css("display", "none");
                $("#rec12").css("display", "none");
                $("#rec13").css("display", "none");
                $("#rec14").css("display", "none");
                $("#rec15").css("display", "block");
            });

            
            

        // nacon products
            $(".click_nacon_revol").click(function () {
                $(".nacon_revol").css("display", "block");
                var click_nacon_revol = $(this).val();
                $("#putProduct").html(click_nacon_revol);
            });
        
        // razeer product
            $(".click_razer_raizu").click(function () {
                $(".razer_raizu").css("display", "block");
                var click_razer_raizu = $(this).val();
                $("#putProduct").html(click_razer_raizu);
            });
        // computer science
            $(".click_computer_comp").click(function () {
                $(".computer_comp").css("display", "block");
                var click_computer_comp = $(this).val();
                $("#putProduct").html(click_computer_comp);
            });
            $(".click_computer_lap").click(function () {
                $(".computer_lap").css("display", "block");
                var click_computer_lap = $(this).val();
                $("#putProduct").html(click_computer_lap);
            });
            $(".click_computer_win").click(function () {
                $(".computer_win").css("display", "block");
                var click_computer_win = $(this).val();
                $("#putProduct").html(click_computer_win);
            });
        // blue
            $(".click_blue_micro").click(function () {
                $(".blue_micro").css("display", "block");
                var click_blue_micro = $(this).val();
                $("#putProduct").html(click_blue_micro);
            });
        // kobo
            $(".click_kobo_reader").click(function () {
                $(".kobo_reader").css("display", "block");
                var click_kobo_reader = $(this).val();
                $("#putProduct").html(click_kobo_reader);
            });
            $(".click_kobo_aurora").click(function () {
                $(".kobo_aurora").css("display", "block");
                var click_kobo_aurora = $(this).val();
                $("#putProduct").html(click_kobo_aurora);
            });
        

            




        // hide products
            $(".hide_comp_science").click(function () {
                $(".sony").css("display", "none");
                $(".nintendo").css("display", "none");
                $(".microsoft").css("display", "none");
                $(".stuf").css("display", "none");
                $(".nacon").css("display", "none");
                $(".razer").css("display", "none");
                $(".computer").css("display", "none");
                $(".blue").css("display", "none");
                $(".kobo").css("display", "none");
            });
        // hide benifts
            $(".hide_benifits").click(function () {
                $(".ps4_fat").css("display", "none");
                $(".ps4_slim").css("display", "none");
                $(".ps4_pro").css("display", "none");
                $(".dual_shock").css("display", "none");
                $(".ps_5").css("display", "none");
                $(".dual_sense").css("display", "none");
                $(".n_switch").css("display", "none");
                $(".n_switch_lite").css("display", "none");
                $(".new_switch").css("display", "none");
                $(".OLED").css("display", "none");
                $(".OLED100").css("display", "none");
                $(".OLED200").css("display", "none");
                $(".xbox_fat").css("display", "none");
                $(".mac2Aab").css("display", "none");
                $(".mac2Aa").css("display", "none");
                $(".mac2Ac").css("display", "none");
                $(".mac2Ad").css("display", "none");
                $(".mac2Ae").css("display", "none");
                $(".mac2Af").css("display", "none");
                $(".mac2Af7").css("display", "none");
                $(".mac2Af8").css("display", "none");
                $(".mac2Af9").css("display", "none");
                $(".xbox_onex").css("display", "none");
                $(".xbox_ones").css("display", "none");
                $(".xbox_oneElite").css("display", "none");
                $(".xbox_one_new").css("display", "none");
                $(".xbox_series_x").css("display", "none");
                $(".xbox_v2").css("display", "none");
                $(".xbox_s_n_x").css("display", "none");
                $(".xbox_series_new_s").css("display", "none");
                $(".scuf_infinit").css("display", "none");
                $(".scuf_impact").css("display", "none");
                $(".scuf_manete").css("display", "none");
                $(".scuf_prestige").css("display", "none");
                $(".scuf_slr").css("display", "none");
                $(".nacon_revol").css("display", "none");
                $(".razer_raizu").css("display", "none");
                $(".computer_comp").css("display", "none");
                $(".computer_lap").css("display", "none");
                $(".computer_win").css("display", "none");
                $(".blue_micro").css("display", "none");
                $(".kobo_reader").css("display", "none");
                $(".kobo_aurora").css("display", "none");


                // hide value of product in summary
                $("#putProduct").html("");
            });
        // returnChoice keyup
        $("#returnChoice").keyup(function(){
            var returnChoice = $(this).val();
            $("#putReturnChoice").html(returnChoice);
        });
        //problemDetect keyup
        $("#problemDetect").keyup(function(){
            var problemDetect = $(this).val();
            $("#putproblemDetect").html(problemDetect);
        });
        // further info
        $("#information").keyup(function(){
            var infor = $('#information').val();
            $("#putInfo").html(infor);
        });
        


        // get benifit to next page
        $("#ps4_fat1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1); 
            var sony1 = $("#sony1").html();
            $("#putBenifit").html(sony1);    
        }); 
        $("#ps4_fat2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1); 
            var sony2 = $("#sony2").html();
            $("#putBenifit").html(sony2);    
        }); 
        $("#ps4_fat3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony3 = $("#sony3").html();
            $("#putBenifit").html(sony3);    
        }); 
        $("#ps4_fat4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony4 = $("#sony4").html();
            $("#putBenifit").html(sony4);    
        }); 
        $("#ps4_fat5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony5 = $("#sony5").html();
            $("#putBenifit").html(sony5);    
        }); 
        $("#ps4_fat6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony6 = $("#sony6").html();
            $("#putBenifit").html(sony6);    
        }); 
        $("#ps4_fat7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony7 = $("#sony7").html();
            $("#putBenifit").html(sony7);    
        }); 
        $("#ps4_fat8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony8 = $("#sony8").html();
            $("#putBenifit").html(sony8);    
        }); 
        $("#ps4_fat9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony9 = $("#sony9").html();
            $("#putBenifit").html(sony9);    
        }); 
        $("#ps4_fat10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony10 = $("#sony10").html();
            $("#putBenifit").html(sony10);    
        }); 
        $("#ps4_fat11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony11 = $("#sony11").html();
            $("#putBenifit").html(sony11);    
        }); 


        $("#ps4_slim1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony12 = $("#sony12").html();
            $("#putBenifit").html(sony12);    
        }); 
        $("#ps4_slim2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony13 = $("#sony13").html();
            $("#putBenifit").html(sony13);    
        }); 
        $("#ps4_slim3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony14 = $("#sony14").html();
            $("#putBenifit").html(sony14);    
        }); 
        $("#ps4_slim4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony15 = $("#sony15").html();
            $("#putBenifit").html(sony15);    
        }); 
        $("#ps4_slim5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony16 = $("#sony16").html();
            $("#putBenifit").html(sony16);    
        }); 
        $("#ps4_slim6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony17 = $("#sony17").html();
            $("#putBenifit").html(sony17);    
        }); 
        $("#ps4_slim7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony18 = $("#sony18").html();
            $("#putBenifit").html(sony18);    
        }); 
        $("#ps4_slim8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony19 = $("#sony19").html();
            $("#putBenifit").html(sony19);    
        }); 
        $("#ps4_slim9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony20 = $("#sony20").html();
            $("#putBenifit").html(sony10);    
        }); 
        $("#ps4_slim10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony21 = $("#sony21").html();
            $("#putBenifit").html(sony21);    
        }); 


        
        $("#ps4_pro1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony22 = $("#sony22").html();
            $("#putBenifit").html(sony22);    
        }); 
        $("#ps4_pro2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony23 = $("#sony23").html();
            $("#putBenifit").html(sony23);    
        }); 
        $("#ps4_pro3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony24 = $("#sony24").html();
            $("#putBenifit").html(sony24);    
        }); 
        $("#ps4_pro4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony25 = $("#sony25").html();
            $("#putBenifit").html(sony25);    
        }); 
        $("#ps4_pro5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony26 = $("#sony26").html();
            $("#putBenifit").html(sony26);    
        }); 
        $("#ps4_pro6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony27 = $("#sony27").html();
            $("#putBenifit").html(sony27);    
        }); 
        $("#ps4_pro7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony28 = $("#sony28").html();
            $("#putBenifit").html(sony28);    
        }); 
        $("#ps4_pro8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony29 = $("#sony29").html();
            $("#putBenifit").html(sony29);    
        }); 
        $("#ps4_pro9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony30 = $("#sony30").html();
            $("#putBenifit").html(sony30);    
        }); 
        $("#ps4_pro10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony31 = $("#sony31").html();
            $("#putBenifit").html(sony31);    
        }); 

        
        $("#dual_shock1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony32 = $("#sony32").html();
            $("#putBenifit").html(sony32);    
        });
        $("#dual_shock2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony33 = $("#sony33").html();
            $("#putBenifit").html(sony33);    
        });
        $("#dual_shock3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony34 = $("#sony34").html();
            $("#putBenifit").html(sony34);    
        });
        $("#dual_shock4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony35 = $("#sony35").html();
            $("#putBenifit").html(sony35);    
        });
        
        $("#ps_5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony36 = $("#sony36").html();
            $("#putBenifit").html(sony36);    
        });
        
        $("#dual_sense").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var sony37 = $("#sony37").html();
            $("#putBenifit").html(sony37);    
        });



        $("#n_switch1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin1 = $("#nin1").html();
            $("#putBenifit").html(nin1);    
        });
        $("#n_switch2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin2 = $("#nin2").html();
            $("#putBenifit").html(nin2);    
        });
        $("#n_switch3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin3 = $("#nin3").html();
            $("#putBenifit").html(nin3);    
        });
        $("#n_switch4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin4 = $("#nin4").html();
            $("#putBenifit").html(nin4);    
        });
        $("#n_switch5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin5 = $("#nin5").html();
            $("#putBenifit").html(nin5);    
        });
        $("#n_switch6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin6 = $("#nin6").html();
            $("#putBenifit").html(nin6);    
        });
        $("#n_switch7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin7 = $("#nin7").html();
            $("#putBenifit").html(nin7);    
        });
        $("#n_switch8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin8 = $("#nin8").html();
            $("#putBenifit").html(nin8);    
        });
        $("#n_switch9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin9 = $("#nin9").html();
            $("#putBenifit").html(nin9);    
        });
        $("#n_switch10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin10 = $("#nin10").html();
            $("#putBenifit").html(nin10);    
        });
        $("#n_switch11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin11 = $("#nin11").html();
            $("#putBenifit").html(nin11);    
        });

        
        $("#n_switch_lite1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin12 = $("#nin12").html();
            $("#putBenifit").html(nin12);    
        });
        $("#n_switch_lite2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin13 = $("#nin13").html();
            $("#putBenifit").html(nin13);    
        });
        $("#n_switch_lite3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin14 = $("#nin14").html();
            $("#putBenifit").html(nin14);    
        });
        $("#n_switch_lite4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin15 = $("#nin15").html();
            $("#putBenifit").html(nin15);    
        });
        $("#n_switch_lite100").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin15 = $("#nin100").html();
            $("#putBenifit").html(nin15);    
        });
        $("#n_switch_lite101").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin15 = $("#nin101").html();
            $("#putBenifit").html(nin15);    
        });
        $("#n_switch_lite102").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin15 = $("#nin102").html();
            $("#putBenifit").html(nin15);    
        });
        $("#n_switch_lite103").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin15 = $("#nin103").html();
            $("#putBenifit").html(nin15);    
        });
        $("#n_switch_lite104").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin15 = $("#nin104").html();
            $("#putBenifit").html(nin15);    
        });
        $("#n_switch_lite105").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin15 = $("#nin105").html();
            $("#putBenifit").html(nin15);    
        });
        
        $("#new_switch1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin17 = $("#nin17").html();
            $("#putBenifit").html(nin17);    
        });
        $("#new_switch2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin18 = $("#nin18").html();
            $("#putBenifit").html(nin18);    
        });

        $("#new_switch400").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin18 = $("#nin400").html();
            $("#putBenifit").html(nin18);    
        });
        $("#new_switch401").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin18 = $("#nin401").html();
            $("#putBenifit").html(nin18);    
        });
        $("#new_switch402").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin18 = $("#nin402").html();
            $("#putBenifit").html(nin18);    
        });
        $("#new_switch403").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin18 = $("#nin403").html();
            $("#putBenifit").html(nin18);    
        });
        $("#new_switch404").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin18 = $("#nin404").html();
            $("#putBenifit").html(nin18);    
        });
        $("#new_switch405").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin18 = $("#nin405").html();
            $("#putBenifit").html(nin18);    
        });
        $("#new_switch406").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin18 = $("#nin406").html();
            $("#putBenifit").html(nin18);    
        });
        $("#new_switch407").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin18 = $("#nin407").html();
            $("#putBenifit").html(nin18);    
        });
        $("#new_switch408").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin18 = $("#nin408").html();
            $("#putBenifit").html(nin18);    
        });

        
        $("#OLED").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin19").html();
            $("#putBenifit").html(nin19);    
        });

        $("#OLED1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin500").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin501").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin502").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin503").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin504").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin505").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin506").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin507").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin508").html();
            $("#putBenifit").html(nin19);    
        });


        $("#OLED100").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin600").html();
            $("#putBenifit").html(nin19);    
        });

        $("#OLED200").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin700").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED2001").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin701").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED2002").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin702").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED2003").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin703").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED2004").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin704").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED2005").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin705").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED2006").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin706").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED2007").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin707").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED2008").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin708").html();
            $("#putBenifit").html(nin19);    
        });
        $("#OLED2009").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nin19 = $("#nin709").html();
            $("#putBenifit").html(nin19);    
        });

        
        $("#xbox_fat1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic100").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic2 = $("#mic200").html();
            $("#putBenifit").html(mic2);    
        });
        $("#xbox_fat3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic3 = $("#mic300").html();
            $("#putBenifit").html(mic3);    
        });
        $("#xbox_fat4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic4 = $("#mic400").html();
            $("#putBenifit").html(mic4);    
        });
        $("#xbox_fat5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic500").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat509").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic600").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat510").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic700").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat520").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic800").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat530").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic900").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat540").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1000").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat550").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook2').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1100").html();
            $("#putBenifit").html(mic5);    
        });


        $("#xbox_fata").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#mica").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fatb").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#micb").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fatc").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#micc").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fatd").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#micd").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fate").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#mice").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fatf").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#micf").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fatg").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#micg").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fath").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#mich").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fati").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#mici").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fatj").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#micj").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fatk").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook3').html();
            $("#putProduct").html(name);
            var mic5 = $("#mick").html();
            $("#putBenifit").html(mic5);    
        });


        $("#xbox_fat1a").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1a").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat1b").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1b").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat1c").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1c").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat1d").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1d").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat1e").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1e").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat1f").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1f").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat1g").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1g").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat1h").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1h").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat1i").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1i").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat1j").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1j").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat1k").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook4').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic1k").html();
            $("#putBenifit").html(mic5);    
        });

        $("#xbox_fat2a").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2a").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat2b").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2b").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat2c").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2c").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat2d").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2d").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat2e").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2e").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat2f").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2f").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat2g").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2g").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat2h").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2h").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat2i").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2i").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat2j").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2j").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat2k").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook5').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic2k").html();
            $("#putBenifit").html(mic5);    
        });


        $("#xbox_fat3a").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3a").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3b").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3b").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3c").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3c").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3d").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3d").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3e").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3e").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3f").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3f").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3g").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3g").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3h").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3h").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3i").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3i").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3j").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3j").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3k").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook6').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3k").html();
            $("#putBenifit").html(mic5);    
        });



        $("#xbox_fat3a1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3a1").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3b2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3b2").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3c3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3c3").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3d4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3d4").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3e5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3e5").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3f6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3f6").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3g7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3g7").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3h8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3h8").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3i9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3i9").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3j10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3j10").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat3k11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook7').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3k11").html();
            $("#putBenifit").html(mic5);    
        });


        
        $("#xbox_fat8a").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook8').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic8a").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat8b").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook8').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic8b").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat8c").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#mic8c').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic8c").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat8d").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#mic8d').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3k11").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat8e").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#mic8e').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic3k11").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat8f").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook8').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic8f").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat8g").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook8').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic8g").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat8h").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook8').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic8h").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat8i").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook8').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic8i").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat8j").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook8').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic8j").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat8k").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook8').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic8k").html();
            $("#putBenifit").html(mic5);    
        });

        
        

        $("#xbox_fat9a").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9a").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat9b").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9b").html();
            $("#putBenifit").html(mic5);    
        });

        $("#xbox_fat9c").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9c").html();
            $("#putBenifit").html(mic5);    
        });

        $("#xbox_fat9d").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9d").html();
            $("#putBenifit").html(mic5);    
        });

        $("#xbox_fat9e").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9e").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat9f").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9f").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat9g").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9g").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat9h").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9h").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat9i").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9i").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat9j").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9j").html();
            $("#putBenifit").html(mic5);    
        });
        $("#xbox_fat9k").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook9').html();
            $("#putProduct").html(name);
            var mic5 = $("#mic9k").html();
            $("#putBenifit").html(mic5);    
        });








        $("#xbox_fat10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat20").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat30").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat40").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat50").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });
        $("#xbox_fat1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var name = $('#macbook1').html();
            $("#putProduct").html(name);
            var mic1 = $("#mic1").html();
            $("#putBenifit").html(mic1);    
        });



        $("#xbox_onex1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic6 = $("#mic6").html();
            $("#putBenifit").html(mic6);    
        });
        $("#xbox_onex2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic7 = $("#mic7").html();
            $("#putBenifit").html(mic7);    
        });
        $("#xbox_onex3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic8 = $("#mic8").html();
            $("#putBenifit").html(mic8);    
        });
        $("#xbox_onex4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic9 = $("#mic9").html();
            $("#putBenifit").html(mic9);    
        });
        $("#xbox_onex5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic10 = $("#mic10").html();
            $("#putBenifit").html(mic10);    
        });
        $("#xbox_onex6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic11 = $("#mic11").html();
            $("#putBenifit").html(mic11);    
        });
        $("#xbox_onex7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic12 = $("#mic12").html();
            $("#putBenifit").html(mic12);    
        });

        $("#xbox_ones1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic13 = $("#mic13").html();
            $("#putBenifit").html(mic13);    
        });
        $("#xbox_ones2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic14 = $("#mic14").html();
            $("#putBenifit").html(mic14);    
        });
        $("#xbox_ones3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic15 = $("#mic15").html();
            $("#putBenifit").html(mic15);    
        });
        $("#xbox_ones4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic16 = $("#mic16").html();
            $("#putBenifit").html(mic16);    
        });
        $("#xbox_ones5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic17 = $("#mic17").html();
            $("#putBenifit").html(mic17);    
        });
        $("#xbox_ones6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic18 = $("#mic18").html();
            $("#putBenifit").html(mic18);    
        });
        $("#xbox_ones7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic19 = $("#mic19").html();
            $("#putBenifit").html(mic19);    
        });


        $("#xbox_oneElite1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic20 = $("#mic20").html();
            $("#putBenifit").html(mic20);    
        });
        $("#xbox_oneElite2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic21 = $("#mic21").html();
            $("#putBenifit").html(mic21);    
        });
        $("#xbox_oneElite3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic22 = $("#mic22").html();
            $("#putBenifit").html(mic22);    
        });
        $("#xbox_oneElite4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic23 = $("#mic23").html();
            $("#putBenifit").html(mic23);    
        });

        $("#xbox_one_new1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic24 = $("#mic24").html();
            $("#putBenifit").html(mic24);    
        });
        $("#xbox_one_new2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic25 = $("#mic25").html();
            $("#putBenifit").html(mic25);    
        });
        $("#xbox_one_new3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic26 = $("#mic26").html();
            $("#putBenifit").html(mic26);    
        });
        $("#xbox_one_new4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic27 = $("#mic27").html();
            $("#putBenifit").html(mic27);    
        });
        $("#xbox_one_new5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic28 = $("#mic28").html();
            $("#putBenifit").html(mic28);    
        });

        $("#xbox_series_x").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic29 = $("#mic29").html();
            $("#putBenifit").html(mic29);    
        });

        $("#xbox_v21").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic30 = $("#mic30").html();
            $("#putBenifit").html(mic30);    
        });
        $("#xbox_v22").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic31 = $("#mic31").html();
            $("#putBenifit").html(mic31);    
        });
        $("#xbox_v23").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic32 = $("#mic32").html();
            $("#putBenifit").html(mic32);    
        });

        $("#xbox_s_n_x1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic33 = $("#mic33").html();
            $("#putBenifit").html(mic33);    
        });

        $("#xbox_s_n_x2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic34 = $("#mic34").html();
            $("#putBenifit").html(mic34);    
        });
        $("#xbox_series_new_s").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var mic35 = $("#mic35").html();
            $("#putBenifit").html(mic35);    
        });

        $("#scuf_infinit1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf1 = $("#scuf1").html();
            $("#putBenifit").html(scuf1);    
        });
        $("#scuf_infini2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf2 = $("#scuf2").html();
            $("#putBenifit").html(scuf2);    
        });
        $("#scuf_infinit3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf3 = $("#scuf3").html();
            $("#putBenifit").html(scuf3);    
        });
        $("#scuf_infinit4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf4 = $("#scuf4").html();
            $("#putBenifit").html(scuf4);    
        });
        $("#scuf_infinit5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf5 = $("#scuf5").html();
            $("#putBenifit").html(scuf5);    
        });
        $("#scuf_infinit6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf6 = $("#scuf6").html();
            $("#putBenifit").html(scuf6);    
        });
        $("#scuf_infinit7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf7 = $("#scuf7").html();
            $("#putBenifit").html(scuf7);    
        });
        $("#scuf_infinit8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf8 = $("#scuf8").html();
            $("#putBenifit").html(scuf8);    
        });

        $("#scuf_impact1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf9 = $("#scuf9").html();
            $("#putBenifit").html(scuf9);    
        });
        $("#scuf_impact2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf10 = $("#scuf10").html();
            $("#putBenifit").html(scuf10);    
        });
        $("#scuf_impact3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf11 = $("#scuf11").html();
            $("#putBenifit").html(scuf11);    
        });
        $("#scuf_impact4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf12 = $("#scuf12").html();
            $("#putBenifit").html(scuf12);    
        });
        $("#scuf_impact5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf13 = $("#scuf13").html();
            $("#putBenifit").html(scuf13);    
        });
        $("#scuf_impact6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf14 = $("#scuf14").html();
            $("#putBenifit").html(scuf14);    
        });
        $("#scuf_impact7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf15 = $("#scuf15").html();
            $("#putBenifit").html(scuf15);    
        });
        $("#scuf_impact8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf16 = $("#scuf16").html();
            $("#putBenifit").html(scuf16);    
        });
        $("#scuf_impact9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf17 = $("#scuf17").html();
            $("#putBenifit").html(scuf17);    
        });


        $("#scuf_manete").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf18 = $("#scuf18").html();
            $("#putBenifit").html(scuf18);    
        });

        $("#scuf_prestige1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf19 = $("#scuf19").html();
            $("#putBenifit").html(scuf19);    
        });
        $("#scuf_prestige2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf20 = $("#scuf20").html();
            $("#putBenifit").html(scuf20);    
        });
        $("#scuf_prestige3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf21 = $("#scuf21").html();
            $("#putBenifit").html(scuf21);    
        });

        $("#scuf_slr").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var scuf22 = $("#scuf22").html();
            $("#putBenifit").html(scuf22);    
        });

        $("#nacon_revol").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var nacon = $("#nacon").html();
            $("#putBenifit").html(nacon);    
        });

        
        $("#razer_raizu").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var razer = $("#razer").html();
            $("#putBenifit").html(razer);    
        });

        $("#computer_comp1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com1 = $("#com1").html();
            $("#putBenifit").html(com1);    
        });
        $("#computer_comp2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com2 = $("#com2").html();
            $("#putBenifit").html(com2);    
        });
        $("#computer_comp3").click(function () {
            var com3 = $("#com3").html();
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            $("#putBenifit").html(com3);    
        });
        $("#computer_comp4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com4 = $("#com4").html();
            $("#putBenifit").html(com4);    
        });
        $("#computer_comp5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com5 = $("#com5").html();
            $("#putBenifit").html(com5);    
        });
        $("#computer_comp6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com6 = $("#com6").html();
            $("#putBenifit").html(com6);    
        });
        $("#computer_comp7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com7 = $("#com7").html();
            $("#putBenifit").html(com7);    
        });
        $("#computer_comp8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com8 = $("#com8").html();
            $("#putBenifit").html(com8);    
        });


        $("#computer_lab1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com9 = $("#com9").html();
            $("#putBenifit").html(com9);    
        });
        $("#computer_lab2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com10 = $("#com10").html();
            $("#putBenifit").html(com10);    
        });
        $("#computer_lab3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com11 = $("#com11").html();
            $("#putBenifit").html(com11);    
        });
        $("#computer_lab4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com12 = $("#com12").html();
            $("#putBenifit").html(com12);    
        });
        $("#computer_lab5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com13 = $("#com13").html();
            $("#putBenifit").html(com13);    
        });
        $("#computer_lab6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com14 = $("#com14").html();
            $("#putBenifit").html(com14);    
        });
        $("#computer_lab7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com15 = $("#com15").html();
            $("#putBenifit").html(com15);    
        });
        $("#computer_lab8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com16 = $("#com16").html();
            $("#putBenifit").html(com16);    
        });

        $("#computer_win1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com17 = $("#com17").html();
            $("#putBenifit").html(com17);    
        });
        $("#computer_win2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com18 = $("#com18").html();
            $("#putBenifit").html(com18);    
        });
        $("#computer_win19").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com19 = $("#com19").html();
            $("#putBenifit").html(com19);    
        });
        $("#computer_win3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var com20 = $("#com20").html();
            $("#putBenifit").html(com20);    
        });

        
        $("#blue_micro").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var blue = $("#blue").html();
            $("#putBenifit").html(blue);    
        });

        
        $("#kobo_reder").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var kobo1 = $("#kobo1").html();
            $("#putBenifit").html(kobo1);    
        });
        $("#kobo_aurora").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var kobo2 = $("#kobo2").html();
            $("#putBenifit").html(kobo2);    
        });



        // iphonw button get prices am values

        // iphone 11 pro
        // ecran
        $("#ecran1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11P").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 11 pro end



         // iphone 11 
        // ecran
        $("#ecran2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#i11").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i11").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 11 end





          // iphone XS MAX 
        // ecran
        $("#ecran3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#iXsM").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec3").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXsM").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone XS max end



              
          // iphone XS  
        // ecran
        $("#ecran4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#iXS").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXS").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone XS end



        


              
          // iphone xr  
        // ecran
        $("#ecran5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#iXR").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iXR").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone Xr

        

        
        


              
          // iphone x
        // ecran
        $("#ecran6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#iX").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec6").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#iX").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone X

    
        

        
        


              
          // iphone 8 plus
        // ecran
        $("#ecran7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#i8p").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec7").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8p").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 8 plus end



        
              
          // iphone 8
        // ecran
        $("#ecran8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#i8").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec8").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i8").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 8  end



                
          // iphone 7 plus
        // ecran
        $("#ecran9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#i7p").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7p").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 7 plus  end



                 
          // iphone 7
        // ecran
        $("#ecran10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#i7").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai9").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec10").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i7").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 7   end


        
                 
          // iphone 6 s plus
        // ecran
        $("#ecran11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#i6sp").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai1").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec11").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6sp").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 6s plus  end




          
                 
          // iphone 6 s
        // ecran
        $("#ecran12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#i6s").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai2").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec12").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6s").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 6s   end


           
          // iphone 6 
        // ecran
        $("#ecran13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#i6p").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec13").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6p").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 6 plus   end




                   
          // iphone 6 
        // ecran
        $("#ecran14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#i6").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai4").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec14").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i6").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 6




           
          // iphone 5
        // ecran
        $("#ecran15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11 = $("#i5").val();
            $("#putProduct").html(i11); 
            var iphone1 = $("#iphone1").html();
            $("#putBenifit").html(iphone1);   


        });
        // battery
        $("#bat15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone2 = $("#iphone2").html();
            $("#putBenifit").html(iphone2);   
        });
         // chai
         $("#chai5").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone3 = $("#iphone3").html();
            $("#putBenifit").html(iphone3);   
        });
         // cam
         $("#cam15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone4 = $("#iphone4").html();
            $("#putBenifit").html(iphone4);   
        });
         // des
         $("#des15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone5 = $("#iphone5").html();
            $("#putBenifit").html(iphone5);   
        });
          // pan
          $("#pan15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone6 = $("#iphone6").html();
            $("#putBenifit").html(iphone6);   
        });
            // pane
            $("#pane15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone7 = $("#iphone7").html();
            $("#putBenifit").html(iphone7);   
        });
            // panne
            $("#panne15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone8 = $("#iphone8").html();
            $("#putBenifit").html(iphone8);   
        });
            // pand
            $("#pand15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone9 = $("#iphone9").html();
            $("#putBenifit").html(iphone9);   
        });
            // panr
            $("#panr15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone10 = $("#iphone10").html();
            $("#putBenifit").html(iphone10);   
        });
            // err
            $("#err15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone11 = $("#iphone11").html();
            $("#putBenifit").html(iphone11);   
        });
            // rec
            $("#rec15").click(function () {
            var price1 = $(this).val();
            $("#putPrice").html(price1);
            var i11P = $("#i5").val();
            $("#putProduct").html(i11P); 
            var iphone12 = $("#iphone12").html();
            $("#putBenifit").html(iphone12);   
        });
        // iphone 5  end




        //macbook1 display block
        $("#mac2Ab").click(function () {
            $(".mac2Aab").css("display", "block");
            $(".mac2Aa").css("display", "none");
        });

        //macbook2 display block
        $("#mac2A").click(function () {
            $(".mac2Aab").css("display", "none");
            $(".mac2Aa").css("display", "block");

        });

        //macbook3 display block
        $("#mac2Acc").click(function () {
            $(".mac2Ac").css("display", "block");
            $(".mac2Ad").css("display", "none");
            $(".mac2Ae").css("display", "none");
            $(".mac2Af").css("display", "none");

        });

        //macbook4 display block
        $("#mac2Add").click(function () {
            $(".mac2Ac").css("display", "none");
            $(".mac2Ad").css("display", "block");
            $(".mac2Ae").css("display", "none");
            $(".mac2Af").css("display", "none");

        });

        //macbook5 display block
        $("#mac2Aee").click(function () {
            $(".mac2Ac").css("display", "none");
            $(".mac2Ad").css("display", "none");
            $(".mac2Ae").css("display", "block");
            $(".mac2Af").css("display", "none");

        });

        //macbook6 display block
        $("#mac2Aff").click(function () {
            $(".mac2Ac").css("display", "none");
            $(".mac2Ad").css("display", "none");
            $(".mac2Ae").css("display", "none");
            $(".mac2Af").css("display", "block");

        });

        //macbook7 display block
        $("#mac2Agg").click(function () {
            $(".mac2Af7").css("display", "block");
            $(".mac2Af8").css("display", "none");
            $(".mac2Af9").css("display", "none");
        });
        

        //macbook8 display block
        $("#mac2Ahh").click(function () {
            $(".mac2Af7").css("display", "none");
            $(".mac2Af8").css("display", "block");
            $(".mac2Af9").css("display", "none");
        });
  

        //macbook9 display block
        $("#mac2Aii").click(function () {
            $(".mac2Af7").css("display", "none");
            $(".mac2Af8").css("display", "none");
            $(".mac2Af9").css("display", "block");
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


            console.log(userId);
            console.log(marks);

            console.log(product);
            console.log(service);
            console.log(information);
            console.log(problem);
            console.log(price);
            console.log(returnChoice);

            $.ajax({
                    url:'{{ url('/insert/parcel')}}',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{'userId':userId,'marks':marks,'product':product,'service':service,
                        'information':information,'shipment':shipment,'problem':problem,'returnChoice':returnChoice,'price':price,},
                        success:function(success){
                            if(success){
                                window.location.href = '/public/SuccessParcel';
                            }             
                        }           
            });
        });
    });






</script>
@endsection