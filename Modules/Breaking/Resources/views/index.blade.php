@extends('welcome')

@section('content')
<h2>A la minute</h2>
<br>
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-success" data-collapsed="0">
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title"> Ajouter une brève </div>
            </div> <!-- panel body -->
            <div class="panel-body">

                <div class="form-group">
                    <label for="textfield" class="control-label"><strong>Titre</strong></label>
                    <div class="controls">
                        <input type="text" class="form-control" name="titre" value="<?php if (isset($titre)) echo $titre; ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="textfield" class="control-label"><strong>Catégorie</strong></label>
                    <div class="controls">
                        <select class="form-control">
                            <option> </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="textfield" class="control-label"><strong>Texte</strong></label>
                    <div class="controls">
                        <textarea class="form-control" rows="20"> </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Publier</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-8">
        Table
    </div>
</div>
@stop