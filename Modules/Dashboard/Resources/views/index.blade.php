@extends('welcome')

@section('title')
    Dashboard
@stop

@section('content')


<div class="row">
	<div class="col-sm-12">
		<div class="well">
		
		    <h3>Bienvenue <strong> <br> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </strong></h3>
		</div>
	</div>
</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-primary panel-table">
					<div class="panel-heading">
						<div class="panel-title">
							<h3>Mes articles par date</h3>
							
							<br> 
							
							<form method="post" role="form" action="{{ URL::to('dashboard') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">
								<div class="col-sm-5">
									<select class="form-control" name="month">
										<option value="01" selected="">Janvier</option>
										<option value="02">Février</option>
										<option value="03">Mars</option>
										<option value="04">Avril</option>
										<option value="05">Mai</option>
										<option value="06">Juin</option>
										<option value="07">Juillet</option>
										<option value="08">Août</option>
										<option value="09">Septembre</option>
										<option value="10">Octobre</option>
										<option value="11">Novembre</option>
										<option value="12">Décembre</option>
    								</select>
								</div>
								<div class="col-sm-5">
									<select class="form-control" name="year">
										<option value="2019">2019</option>
										<option value="2018">2018</option>
										<option value="2018">2018</option>
										<option value="2017">2017</option>
									 	<option value="2016">2016</option>
									 	<option value="2015">2015</option>
									 	<option value="2014">2014</option>
									 	<option value="2013">2013</option>
									 	<option value="2012">2012</option>
     								</select>
								</div>
								<div class="col-sm-2">
									<button class="btn btn-primary">Mise a jour</button>
								</div>
							</div>
							</form>
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					<div class="panel-body">	
						<table class="table table-responsive">
							<thead>
								<tr>
									<th> Titre</th>
									<th> Date publication </th>
									<th> Rubrique</th>
									<th> En ligne</th>
									<th> Action</th>
								</tr>
							</thead>
							
							<tbody>
								
							

							</tbody>
						</table>
					</div>
				</div>
				
			</div>
			
		</div>
		
		
	@section('javascript')
	
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">
	
	<!-- Imported scripts on this page -->
	<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="assets/js/jquery.sparkline.min.js"></script>
	<script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
	<script src="assets/js/rickshaw/rickshaw.min.js"></script>
	<script src="assets/js/raphael-min.js"></script>
	<script src="assets/js/morris.min.js"></script>
	<script src="assets/js/toastr.js"></script>
	<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>
	
	@endsection
	
@endsection