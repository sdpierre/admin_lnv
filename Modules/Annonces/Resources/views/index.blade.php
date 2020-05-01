@extends('welcome')

@section('title', 'Petites annonces')

@section('content')

<h2>Annonces</h2>
<br>
<div class="row">
    <div class="col-sm-4">
    <form role="form" id="form1" method="POST" enctype="multipart/form-data" class="validate" action="{{ route('publier_annonce') }}">
                    {{csrf_field()}}

            <input type="hidden" name="id_annonces" value="<?php if(isset($id_annonces))echo $id_annonces;?>">
            <div class="control-group">
      <label for="textfield" class="control-label">Feuille de route</label>
      <div class="controls">
        <input type="text" name="feuillederoute" class="form-control" value="<?php if(isset($feuillederoute))echo $feuillederoute;?>" required>		
      </div>
</div>

<br>

<div class="control-group">
      <label for="textfield" class="control-label">Departement</label>
      <div class="controls">

      <select name="departements" class="form-control" id="select" class='input-large'>
  <?php foreach ($departement as $type){ ?>
<option value="<?=$type['id']?>" <?php if(isset($departements)){ if($type['id'] == $departements) { echo 'selected';}}?>> <?= $type['department']?> </option>
  <?php }?>
</select>
      </div>
</div>

<br>


<div class="control-group">
      <label for="textfield" class="control-label">Ville</label>
      <div class="controls">

      <select name="villes" class="form-control" id="select" class='input-large'>
  <?php foreach ($villes as $type){ ?>
    <option value="<?=$type['id']?>" <?php if(isset($villesid)){ if($type['id'] == $villesid) { echo 'selected';}}?>> <?= $type['city']?> </option>
  <?php }?>
</select>
      </div>
</div>

<br>


<div class="control-group">
      <label for="textfield" class="control-label">Catégories</label>
      <div class="controls">

      <select name="rubriqueid" class="form-control" id="select" class='input-large'>
  <?php foreach ($AnnoncesType as $type){ ?>
<option value="<?=$type['rubriqueid']?>" <?php if(isset($rubriqueid)){ if($type['rubriqueid'] == $rubriqueid) { echo 'selected';}}?>> <?= $type['rubrique']?> </option>
  <?php }?>
</select>
      </div>
</div>

<br>



<div class="control-group">
 <label for="textfield" class="control-label"><strong>Titre</strong></label>
  <div class="controls">
   <input type="text" class="form-control" name="titre" value="<?php if(isset($titre))echo $titre;?>" required>
		  
  </div>
</div>

<br>

<div class="control-group">
 <label for="textfield" class="control-label"><strong>Texte</strong></label>
  <div class="controls">
   <textarea name="texte" cols="40" class="form-control" rows="10" wrap="VIRTUAL" value="<?php if(isset($texte))echo $texte;?>" required><?php if(isset($texte))echo $texte;?></textarea>
  </div>
</div>

<br>



<div class="control-group">
 <label for="textfield" class="control-label"><strong>Date</strong></label>
  <div class="controls">
   <input type="text" name="date" class="form-control date" placeholder="Choisissez les dates" value="<?php if(isset($date))echo $date;?>" required>
  </div>
</div>

<br>




<div class="form-actions">
	<button type="submit" class="btn btn-primary">Publier</button>
</div>

</form>
                </div>
    <div class="col-sm-8">




    liste

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
        @if(!empty($all_annonce))
        @foreach ($all_annonce as $keyRub)
    <tr>
      <th scope="row"><a href="{{ URL::to('/') }}/annonces/details/{{$keyRub->id_annonces}}"> {{$keyRub->titre}}</a></th>
      <td>{{$keyRub->datepublication}}</td>
      <th scope="row"><a href="{{ URL::to('/') }}/annonces/destroy/{{$keyRub->id_annonces}}"> Delete</a></th>
    </tr>
   
    @endforeach
	@endif

  </tbody>
</table>



    </div>
             
</div>




@endsection

@section('javascript')
<script>
$('.date').datepicker({
  multidate: true,
	format: 'mm/dd/yyyy',
  todayHighlight: true,
  weekStart: 1,
  language:'fr'
  
});
</script>
@endsection
