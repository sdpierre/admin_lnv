<aside class="sidebar pull-right same_height">
                    	<div class="product_feature_area">
                            <h3>Annonces à la une</h3>
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
                                    	<p><a href="{{ URL::to('/') }}/annonces/details/{{$Featured->id_annonces}}"> <?= $Featured['titre']?> </a> </p>
                                        <a href="#" class="price_box"><?= $Featured['prix']?></a>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>

                    </aside>