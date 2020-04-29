@extends('welcome')

@section('title', 'Petites annonces')

@section('content')

<div class="container content_area"><!--start container-->
            <div class="row">
                @include('Annonces::search_bar')
                <div class="content center_content">
                    <div class="content_left pull-left same_height">
                        <div class="row">
                            <div class="col-sm-12">
	                            <h4 style="padding-top:20px;"> {{$rubriquename}} </h4>
                        
                            </div>
                        </div>
                    	<div class="tab_menu_area">
                        	<ul class="menu_slider">
							@foreach ($annonces as $key)
							    <li><a href="{{ URL::to('/') }}/annonces-rubrique/{{$key->rubriqueid}}">{{$key->rubrique}}</a></li>
							@endforeach
                            </ul>
                        </div>
						
                        <div class="tab_menu_content_box">
								@if(!empty($annoncesRubriq))
								@foreach ($annoncesRubriq as $keyRub)
                        	<div class="tab_menu_row">
                            	<div class="tab_menu_left pull-left">
                                	<div class="tab_menu_photo pull-left">
	                                	<a href="#">
		                                	
		                                	@if(empty($keyRub['photo1']))
		                                	<img src="{{ asset('images/annonce.jpg')}}" width="142" height="91" alt=""/></a>
		                                	@else
		                                	<img src="http://images.lenouvelliste.com/annonces/<?= $keyRub['folder']?>/<?= $keyRub['photo1']?>" width="142" height="91" alt=""/></a>
		                                	@endif
		                                	
		                                	
		                                	</div>
                                    <div class="tab_menu_photo_info pull-right">
                                    	<h4><a href="{{ URL::to('/') }}/annonces/details/{{$keyRub->id_annonces}}"> {{$keyRub->titre}} </h4>
                                        <p>{!! str_limit($keyRub->texte, $limit = 100, $end = '...') !!}</p>
                                    </div>
                                </div>
                                <div class="tab_menu_right pull-right">
                                	<!-- <p>Lundi, 19:20 <br>11 avril 2016</p> -->
                                </div>
                            </div>
					@endforeach
					@endif

                                                        <div class="pagination_box">
                            	<div class="prev_next">
                                	<a href="#"></a>
                                  
                                </div>
                            	<ul>@if(!empty($annoncesRubriq))
									{!! $annoncesRubriq->render() !!}
									@endif
                                </ul>
                                <div class="prev_next prev_next_right">
                                    
              
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('Annonces::featured')
                    <div class="clearfix"></div>
                </div>
            </div><!--//end .row-->
        </div><!--//end .container-->
@endsection
