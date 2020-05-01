@extends('welcome')

@section('title', 'Petites annonces')

@section('content')

<div class="container content_area"><!--start container-->
            <div class="row">
                <div class="content center_content inner_content_bg">
                    <div class="content_left pull-left same_height">
                    	<div class="classifileld_content">
	                    	@foreach ($annonces as $key)
                        	<div class="breadcrumb_area">
                            	<ul>
                                	<li><a href="{{ URL::to('/') }}/annonces">Petites Annonces</a></li>    
                                    <li><?php //rubriqueShouw($key['rubriqueid']);?></li>
                                    <li>{{ $key->titre }}</li>
                                </ul>
                            </div>
                            
                            <h4> {{$key->titre}}</h4>
                            <div id="slider" class="flexslider">
                   <ul class="slides">
				   <?php if(!empty($key['photo1'])){?>
					    <li><img src="http://images.lenouvelliste.com/annonces/<?= $key['folder']?>/<?= $key['photo1']?>" width="638" height="433" alt=""/></li>
				   <?php }?>
				   	<?php if(!empty($key['photo2'])){?>
					    <li><img src="http://images.lenouvelliste.com/annonces/<?= $key['folder']?>/<?= $key['photo2']?>" width="638" height="433" alt=""/></li>
				   <?php }?>
				   <?php if(!empty($key['photo3'])){?>
					    <li><img src="http://images.lenouvelliste.com/annonces/<?= $key['folder']?>/<?= $key['photo3']?>" width="638" height="433" alt=""/></li>
				   <?php }?>
				   
				    <?php if(!empty($key['photo4'])){?>
					    <li><img src="http://images.lenouvelliste.com/annonces/<?= $key['folder']?>/<?= $key['photo4']?>" width="638" height="433" alt=""/></li>
				   <?php }?>
                
                                                                    </ul>
                        	</div>
                            <div class="carousel_slider_inner">
                                <div id="carousel" class="flexslider">
                                    <ul class="slides">
         				   <?php if(!empty($key['photo1'])){?>
					    <li><img src="http://images.lenouvelliste.com/annonces/<?= $key['folder']?>/<?= $key['photo1']?>" width="638" height="433" alt=""/></li>
				   <?php }?>
				   	<?php if(!empty($key['photo2'])){?>
					    <li><img src="http://images.lenouvelliste.com/annonces/<?= $key['folder']?>/<?= $key['photo2']?>" width="638" height="433" alt=""/></li>
				   <?php }?>
				   <?php if(!empty($key['photo3'])){?>
					    <li><img src="http://images.lenouvelliste.com/annonces/<?= $key['folder']?>/<?= $key['photo3']?>" width="638" height="433" alt=""/></li>
				   <?php }?>
				   
				    <?php if(!empty($key['photo4'])){?>
					    <li><img src="http://images.lenouvelliste.com/annonces/<?= $key['folder']?>/<?= $key['photo4']?>" width="638" height="433" alt=""/></li>
				   <?php }?>   
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product_lundi"> 
                        	<!-- <p>Lundi, 19:20 11 avril 2016</p> -->
                            <!-- <h6>User Name</h6> -->
                        </div>
                        <div class="content_price_table">
                        	<div class="content_price_row">
                            	<span>Prix</span>
                                <strong><?= $key['prix']?></strong>
                            </div>
                            <div class="content_price_row">
                            	<span>Département</span>
                                <p><?php //selDepartmen($key['departement_id']);?></p>
                                <small><img src="{{asset('images/location_icon.png') }}" width="33" height="33" alt=""/></small>
                            </div>
                            <div class="content_price_row">
                            	<span>Ville</span>
                                <p><?php  //selville($key['ville_id']);?></p>
                                <small><img src="{{asset('images/location_icon.png') }}" width="33" height="33" alt=""/></small>
                            </div>
                        </div>
                        <div class="product_description"> 
                        	<p><strong>Description :</strong></p>
                            <p> <?= $key['texte']?> </p>
                        </div>
                        <div class="product_social_container">
						<!---
                        	<div class="product_social_left pull-left">
                            	<span class="save_listing"><a href="#">Save Listing</a></span>
                                <span class="report_problem"><a href="#">Report a problem</a></span>
                            </div>
							-->
                            <!--
<div class="video_slider_social pull-right">
                                <span class="facebook_social"><a href="#">125</a></span>
                                <span class="twitter_social"><a href="#">53</a></span>
                                <span class="google_plus_social"><a href="#">442</a></span>
                            </div>
-->
                        </div>
                         @endforeach
                         
                         
                        <!--
<div class="product_social_table">
                        	<div class="product_social_row">
                            	<div class="product_info_column">
                                	<h6>Dummy Standard</h6>
                                	<p>Lorem Ipsum is simply dummy <br>text of the printing and typesetting</p>
                                    <a href="#" class="read_btn">READ MORE</a>
                                </div>
                                <div class="product_info_column">
                                	<h6>Dummy Standard</h6>
                                	<p>Lorem Ipsum is simply dummy <br>text of the printing and typesetting</p>
                                    <a href="#" class="read_btn">READ MORE</a>
                                </div>
                            </div>
                            <div class="product_social_row product_social_row2">
                            	<div class="product_info_column">
                                	<h6>Dummy Standard</h6>
                                	<p>Lorem Ipsum is simply dummy <br>text of the printing and typesetting</p>
                                    <a href="#" class="read_btn">READ MORE</a>
                                </div>
                                <div class="product_info_column">
                                	<h6>Dummy Standard</h6>
                                	<p>Lorem Ipsum is simply dummy <br>text of the printing and typesetting</p>
                                    <a href="#" class="read_btn">READ MORE</a>
                                </div>
                            </div>
                        </div>
-->
                        
                        
                        <div class="clearfix"></div>
                    </div>
                    
                    
                    <aside class="sidebar pull-right same_height">
                    	
                    	
                    	<div class="product_feature_area">
                            <h3>Annonces a la une</h3>
                            <div class="product_column_holder">
	                            
	                            @foreach ($featured as $Featured)
                            	<div class="product_column">
	                            	
                                	<a href="#">
	                                	
	                                		@if(empty($Featured['photo1']))
		                                	<img src="{{ asset('images/annonce_featured.jpg')}}" width="273" height="161" alt=""/>
		                                	@else
		                                	<img src="http://images.lenouvelliste.com/annonces/<?= $Featured['folder']?>/<?= $Featured['photo1']?>" width="273" height="161" alt=""/>
		                                	@endif
	                                	
                                	</a>

	                                	</a>
                                	
                                    <div class="product_info">
                                    	<p> <a href="{{ URL::to('/') }}/annonces/details/{{$Featured->id_annonces}}"> <?= $Featured['titre']?></a></p>
                                        <a href="#" class="price_box"><?= $Featured['prix']?></a>
                                    </div>
                                </div>
                                @endforeach
                                                                
                      
                                
                                
                            </div>
                        </div>
                        
                    </aside>
                    <div class="clearfix"></div>
                </div>
            </div><!--//end .row-->
        </div><!--//end .container-->
        
               
        @endsection