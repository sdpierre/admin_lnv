@extends('welcome')

@section('title')
Recherche
@stop
@section('my-css')
<link rel="stylesheet" href="/css/datatables.css">
@endsection
@section('content')


<div class="row">
    <div class="col-md-9 col-sm-7">
        <h3> Recherche </h3>
        <br><br>
    </div>

    <div class="col-md-3 col-sm-5">
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="jumbotron">
            <form action="" method="GET">
                <div class="form-group row">
                    <div class="col-md-12">
                        <h4> title </h4>
                        <input type="text" class="form-control" name="title" value="{{ request()->get('title') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <h4> Des mots dans l'article </h4>
                        <input type="text" class="form-control" name="article_word" value="{{ request()->get('article_word') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <h4> Nom de l'auteur / collaborateur </h4>
                        <input type="text" class="form-control" name="author_name" value="{{ request()->get('author_name') }}">
                    </div>

                    <div class="col-md-6">
                        <h4> Auteur du Nouvelliste </h4>
                        <select name="author" class="form-control">
                            <option value=""></option>
                            @foreach($authors as $author)
                            <option @if(request()->get('author') == $author->id) selected
                                @endif value="{{ $author->id }}">{{ $author->first_name ." ". $author->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <h4> Date minimum </h4>
                        <input type="text" class="form-control mindate" name="min_date" value="{{ request()->get('min_date') }}">
                    </div>

                    <div class="col-md-6">
                        <h4> Date maximum </h4>
                        <input type="text" class="form-control maxdate" name="max_date" value="{{ request()->get('max_date') }}">
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Recherche</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>


<br>

<div class="jumbotron jumbotron-fluid">
    <h2> <strong> {{ $articles->total() }} résultats </strong> </h2>
</div>

<table class="table table-bordered responsive" id="table-2">
    <thead>
        <tr>
            <th> </th>
            <th>No.</th>
            <th>Title</th>
            <th>Status</th>
            <th>Auteur</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($articles as $post)
        <tr>
            <td><input type="checkbox"></td>
            <td>{{ $post->id_article }}</td>
            <td>{{ $post->title }}</td>
            <td><?php if ($post->is_active == "TRUE") { ?>
                    <span class="label label-success"> Online </span>
                <?php } else { ?>
                    <span class="label label-danger"> Offline </span>
                <?php } ?>
            </td>
            <td> </td>
            <td>{{ $post->publication_date }}</td>
            <td>
                <a href="{{ url("/edit/post/") ."/". $post->id_article }}" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="entypo-pencil"></span></a>
                <!-- <button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="deleteArticle({{ $post->id_article }})"><span class="entypo-trash"></span></button> -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- <center> {{ $articles->render() }} </center> -->

<center> {!! $articles->appends(Request::except('page'))->render() !!} </center>

@endsection

@section('javascript')
<script type="text/javascript">
    window.base_url = "{{ url('') }}";
    window.$ = jQuery;
    window.csrf = "{{ csrf_token() }}";

    function deleteArticle(id) {
        $.ajax({
            url: base_url + "/article/delete/" + id,
            method: 'POST',
            data: {
                _token: csrf
            },
            success: function(data) {
                alert(data);
                window.location.reload(1);
            }
        })
    }

    jQuery(document).ready(function() {
        var mindate_el = $(".mindate");
        var maxdate_el = $(".maxdate");

        mindate_el.datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function(date) {
                console.log(date);
                maxdate_el.datepicker("option", "minDate", date);
            }
        });

        maxdate_el.datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function(date) {
                mindate_el.datepicker("option", "maxDate", date);
            }
        });
    });
</script>
@endsection