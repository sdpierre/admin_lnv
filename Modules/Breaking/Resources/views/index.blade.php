@extends('welcome')

@section('content')
    <h1>Breaking News</h1>

    <p>
        This view is loaded from module: {!! config('breaking.name') !!}
    </p>
@stop
