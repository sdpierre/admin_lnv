@extends('welcome')

@section('title')
    Articles
@stop

@section('content')

<div class="row">
    <div class="col-md-9 col-sm-7">
        <h3> Ajouter une nouvelle publication </h3>
        <br><br>
    </div>

    <div class="col-md-3 col-sm-5">
    </div>
</div>

		<style>
		.main-content {
				background: #F1F1F1 !important;
			}
		.ms-container .ms-list {
			width: 135px;
			height: 205px;
			}

		.post-save-changes {
			float: right;
		}

		@media screen and (max-width: 789px)
		{
			.post-save-changes {
				float: none;
				margin-bottom: 20px;
			}
		}

		#select2{
   display: none;
}
		</style>

<div class="row">
	<div class="col-sm-9">

			<form role="form" id="form" method="post" class="validate" novalidate="novalidate">

			<!-- Title and Publish Buttons -->
			<div class="row">
				<div class="col-sm-12">

				<div class="form-group">
					<input type="text" class="form-control input-sm" name="post_surtitre" value="{{ $article->surtitre }}" style="font-size:12px;" placeholder="Sur-titre">
				</div>

				<div class="form-group">
					<input type="text" class="form-control input-lg" name="post_titre" value="{{ $article->titre }}" style="font-size:18px;" pattern="A-Z" data-validate="required" data-message-required="Titre obligatoire" placeholder="Titre">
				</div>

				<div class="form-group">
					<input type="text" class="form-control input-sm" name="post_soustitre" value="{{ $article->soustitre }}" style="font-size:12px;" placeholder="Sous Titre">
				</div>

				<div class="form-group">
					<textarea class="form-control" rows="5" style="font-size:12px; font-style:italic;" name="post_chapeau"  id="post_content" placeholder="Chapeau">{{ $article->chapeau }}</textarea>
				</div>


				</div>
			</div>

			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<!-- WYSIWYG - Content Editor -->
			<div class="row">
				<div class="form-group col-sm-12">
					<textarea class="form-control ckeditor" name="post_content" cols="150" rows="50" data-validate="required" data-message-required="Texte obligatoire">{{ $article->article }}</textarea>
				</div>
			</div>

	</div>

	<div class="col-sm-3">

		@include('article::sidebar')

	</div>
  </form>
</div>

@section('javascript')

		<!--
<script
  src="https://code.jquery.com/jquery-1.6.1.min.js"
  integrity="sha256-x4Q3aWDzFj3HYLwBnnLl/teCA3RaVRDGmZKjnR2P53Y="
  crossorigin="anonymous"></script>
-->

<script src="/js/ckeditor/ckeditor.js"></script>

<link rel="stylesheet" href="{{ asset('js/wysihtml5/bootstrap-wysihtml5.css') }}">
<link rel="stylesheet" href="{{ asset('js/selectboxit/jquery.selectBoxIt.css') }}">

<!-- Imported scripts on this page -->
<script src="{{ asset('js/wysihtml5/bootstrap-wysihtml5.js') }}"></script>

<script src="{{ asset('js/fileinput.js') }}"></script>

<script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>

<!-- <script src="{{ asset('js/bootstrap-datepicker.fr.min.js') }}"></script> -->
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

<script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}" id="script-resource-8"></script>



<script>
	window.subcategories = JSON.parse(`{!! json_encode($chroniques) !!}`);
	console.log(subcategories);
	jQuery(function($){
		$("#select1").change(function(){
		    if($(this).val() == 19){
		      $("#select2").show();
		    }else{
		      $("#select2").hide();
		    }
		});

		$('.post_category').on('change', function(){
			console.log("changed");
			var cat_id = $(this).val();
			var subcats;
			var subcat_el = $('.post_chronique');
			subcat_el.html("");
			if(subcats = subcategories[cat_id]){
				var temp = `<option value=""></option>`;
				for(subcat in subcats){
					temp += `<option value="${subcats[subcat].id}">${subcats[subcat].name}</option>`
				}
				console.log(temp);
				subcat_el.html(temp);
			}
		})
	})
</script>

<script>
	CKEDITOR.config.allowedContent = true;
	CKEDITOR.editorConfig = function( config )
	
{
    config.language = 'fr';
    config.uiColor = '#AADC6E';
    config.skin = 'flat';
    config.autoGrow_maxHeight = 600;
    config.extraPlugins = 'pastetext';
	config.htmlEncodeOutput = false;
	config.entities = false;

};
</script>


@stop




@endsection