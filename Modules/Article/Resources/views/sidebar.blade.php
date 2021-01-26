

	<div class="row">
        <!-- Metabox :: Parametre de publication -->

        <div class="col-sm-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Paramètres de publication
                    </div>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"></a>
                    </div>
                    
                </div>

                <div class="panel-body">
	                <div class="row">
		                
		                <div class="col-sm-12">
			                <div class="form-group">
								<label> <i class="entypo-eye"></i>	Status : <strong> @if($article->enligne == "TRUE") En Ligne @else Hors Ligne @endif </strong> </label>
			                </div>
		            	</div>
		            	
		            	<div class="col-sm-12">
			            <label> <i class="entypo-calendar"></i>	Date de Publication </label>
							<div class="form-group">
			            	<input type="text" value="{{ Carbon\Carbon::parse($article->datepublication)->format("Y-m-d") }}" class="form-control datepicker" name="post_date">
							</div>
		            	</div>
		            	
		            	<div class="col-sm-12">
			            <label> <i class="entypo-eye"></i>	Corrigé : <input type="checkbox" name="vehicle1" value="Bike"> </label>
		            	</div>
		            	
		            	<div class="col-sm-12">
			            <label> <i class="entypo-eye"></i>	Vues : <strong> {{ $article->click }} </strong> </label>
		            	</div>
		            	
	                </div>

                </div>

                <div class="panel-footer">
	                <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

	<div class="row">
        <!-- Metabox :: Tags -->

        <div class="col-sm-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Section
                    </div>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"></a>
                    </div>
                </div>

                <div class="panel-body">

	                <div class="form-group">
                    <select name="post_category" class="post_category form-control" id="select1">
	                     <option value=""></option>
	                     @foreach ($category as $category)
	                    	<option @if($category->rubriqueid == $article->rubriqueid) selected @endif value="{{ $category->rubriqueid }}"> {{ $category->rubriquename }} </option>
	                     @endforeach

					</select>
	                </div>

	                <div class="form-group">
		                Chronique
                    <select name="post_chronique" class="post_chronique form-control">
     
                        @if($article->chronique)
                        <option value=""></option>
	                    @foreach ($chroniques[$article->rubriqueid] as $chroniques)
	                    	<!-- <option value="{{ $chroniques->id }}"> {{ $chroniques->name }} </option> -->
	                    	<option @if($chroniques->id == $article->chronique) selected @endif value="{{ $chroniques->id }}"> {{ $chroniques->name }} </option>
	                    @endforeach
	                    
                        @endif
					</select>
	                </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Metabox :: Tags -->

        <div class="col-sm-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Auteurs
                    </div>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"></a>
                    </div>
                </div>

                <div class="panel-body">
	            
	            @foreach ( $user_details as $user )
	            	<?php $user = $user->group_id; ?>
	            @endforeach
	            
                @if($user == '4' || $user == '2')
                	<strong> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </strong>
                	<input type="hidden" name="post_auteurid" value="{{ Auth::user()->id }}" class="form-control">

                @else
                    <label for="">Rédacteurs</label>
                	 <select name="post_auteurid" class="form-control">
	                    <option value=""></option>
						@foreach ($users as $user)
							<option @if($user->id == $article->auteurid) selected @endif value="{{ $user->id }}"> {{ $user->first_name }} {{ $user->last_name }} </option>
						@endforeach
					</select>

                <br />

                <!-- <div class="form-group">
                    <label for="">Collaborateurs</label>
                    <select name="post_auteurid" class="form-control">
                    <option value=""></option>
                    @foreach ($collab as $user)
							
                    @endforeach
                    </select>
                </div> -->

                <div class="form-group">
                	<label for="">Insérer l'auteur(s)</label>
                	<input name="post_auteur" value="{{ $article->auteur }}" type="text" class="form-control" id="">
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Metabox :: Auteur -->

        <div class="col-sm-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        Mots-clés
                    </div>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"></a>
                    </div>
                </div>

                <div class="panel-body">
                    <input type="text" name="post_motscles" value="{{ $article->motscles }}" class="form-control tagsinput" data-validate="required" data-message-required="Mot-clés obligatoire">
                </div>
            </div>
        </div>
    </div>
