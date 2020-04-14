@extends('welcome')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Emails</th>
                </tr>
            </thead>
            @if($emails)
            <tbody>
                @foreach ($emails as $emails)
                <tr>
                    <td>{{ $emails->id}}</td>
                    <td>{{ $emails->email }}</td>
                    <td class="d-flex">
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
</div>
@stop