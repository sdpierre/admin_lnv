
                <div class="classifileld_top center_content">
                <form role="form" id="form1" method="POST" enctype="multipart/form-data" class="validate" novalidate="novalidate" action="{{ route('search') }}">
                    {{csrf_field()}}
                        <div class="classifileld_top_field">
                        	<div class="form-group pull-left"><input type="text" name="search"class="form-control" placeholder="Que recherchez-vous ?"/></div>
                            <div class="classifileld_top_right pull-right">
                                <div data-toggle="buttons" class="btn-group btn-group-justified fancy-radio-group">
                                    <div class="checkbox_row">
                                        <label class="btn btn-fancy-radio text-xs text-no-transform active">
                                            <input type="radio"  class="hidden" name="options" value="titre">
                                        </label>
                                        <small>Recherche dans le titre uniquement</small>
                                    </div>
                                    <div class="checkbox_row">
                                        <label class="btn btn-fancy-radio text-xs text-no-transform">
                                            <input type="radio" checked="checked" class="hidden" name="options" value="texte">
                                        </label>
                                        <small>Rechercher dans le texte d'annonce</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    	<div class="classifileld_select_holder">
                            <div class="form-group">
                                <div class="select_column">
                                    <select name="categories" class="selectpicker">
                                        <option>Toutes categories</option>
									@foreach ($annonces as $key)
                                          <option value="{{$key->rubriqueid}}">{{$key->rubrique}}</option>
									@endforeach
                                    </select>
                                </div>
                                <div class="select_column">
                                    <select name="départements" class="selectpicker">
                                        <option>Tous les départements</option>
                                    @foreach ($departement as $key)
                                        <option value="{{$key->id}}">{{$key->department}}</option>
									@endforeach
                                 
                                    </select>
                                </div>
                                <div class="select_column">
								  <select name="ville" class="selectpicker">
                                        <option>Tous les villes</option>
                                    @foreach ($villes as $key)
                                        <option value="{{$key->id}}" >{{$key->city}}</option>
									@endforeach
                                 
                                    </select>
                                </div>
                                <div class="select_column">
                                   <input type="submit" value="Rechercher"/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                   </form>
                </div>