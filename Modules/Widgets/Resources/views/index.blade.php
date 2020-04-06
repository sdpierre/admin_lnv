@extends('welcome')

@section('content')
<h2>Widgets disponibles</h2>

<br>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary" data-collapsed="0">
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Haiti : Corona virus en chiffres</div>
                <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
            </div> <!-- panel body -->
            <div class="panel-body">

            <?php $id = '1' ?>
            <form role="form" id="form1" method="POST" enctype="multipart/form-data" class="validate" novalidate="novalidate" action="{{ route('widget_update_corona', [$id]) }}">
                    {{csrf_field()}}

                <div class="form-group"> 
                    <div class="col-sm-12">
                        <label>Nbres de Cas prélevés</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cas_preleves" value="{{ $editCorona->cas_preleves }}"> 
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="col-sm-12">
                        <label>Résultats disponibles</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="resultats" value="{{ $editCorona->resultats }}">
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="col-sm-12">
                        <label>Cas Négatifs</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cas_negatifs" value="{{ $editCorona->cas_negatifs }}">
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="col-sm-12">
                        <label>Cas Confirmés</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cas_confirmes" value="{{ $editCorona->cas_confirmes }}">
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="col-sm-12">
                        <label>Décès Confirmés</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="deces" value="{{ $editCorona->deces }}">
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="col-sm-12">
                        <label>Date</label>
                        <div class="form-group">
                            <input class="datepicker" name="date" value="{{ $editCorona->date }}">
                        </div>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="col-sm-12">
                        <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>

                </form>
            

            </div>
        </div>
    </div>
</div>

@section('javascript')
<script>
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
})
</script>
@stop

@stop