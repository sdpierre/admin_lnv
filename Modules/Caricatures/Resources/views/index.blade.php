@extends('welcome')

@section('content')


<div class="row">
    <div class="col-sm-12">
        <h3>
            Caricatures
            &nbsp;
            <a href="#" class="btn btn-default btn-sm btn-icon icon-left"> <i class="entypo-pencil"></i>
                Ajouter une photo
            </a> </h3>
        <hr>
        <div class="image-categories"> <span>Filter Images:</span> <a href="#" class="active" data-filter="all">Show All</a> /
            <a href="#" data-filter="1d">Taken today</a> /
            <a href="#" data-filter="3d">Taken three days ago</a> /
            <a href="#" data-filter="1w">Taken a week ago</a> </div>
        </div>
</div>

<div class="row">
    <div class="col-sm-2 col-xs-4" data-tag="1d">
        <article class="image-thumb"> <a href="#" class="image"> <img src="https://demo.neontheme.com/assets/images/album-image-1.jpg"> </a>
            <div class="image-options"> <a href="#" class="edit"><i class="entypo-pencil"></i></a> <a href="#" class="delete"><i class="entypo-cancel"></i></a> </div>
        </article>
    </div>
    <div class="col-sm-2 col-xs-4" data-tag="3d">
        <article class="image-thumb"> <a href="#" class="image"> <img src="https://demo.neontheme.com/assets/images/album-image-2.jpg"> </a>
            <div class="image-options"> <a href="#" class="edit"><i class="entypo-pencil"></i></a> <a href="#" class="delete"><i class="entypo-cancel"></i></a> </div>
        </article>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('js/dropzone/dropzone.css') }}">
<script src="{{ asset('js/dropzone/dropzone.js') }}"></script>


@stop


