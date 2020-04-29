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
                        <h4> Annonces : Centre </h4>
                            </div>
                        </div>
              
						
                        <div class="tab_menu_content_box">
	      								@if(!empty($annoncesRubriq))
								@foreach ($annoncesRubriq as $keyRub)
                        	<div class="tab_menu_row">
                            	<div class="tab_menu_left pull-left">
                                	<div class="tab_menu_photo pull-left"><a href="#"><img src="images/small_photo8.png" width="142" height="91" alt=""/></a></div>
                                    <div class="tab_menu_photo_info pull-right">
                                    	<h4>Dummy Standard</h4>
                                        <p>{{$keyRub->titre}}</p>
                                    </div>
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
