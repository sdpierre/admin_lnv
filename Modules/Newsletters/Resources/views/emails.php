@extends('welcome')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Url</th>
                    <th>Caption</th>
                    <th>Decription</th>
                    <th>Date and hours</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            @if($newsLetters)
            <tbody>
                @foreach ($newsLetters as $newsLetter)
                <tr>
                    <td>
                        <img src="{{url('uploads/photo/'.$newsLetter->photo)}}" width="100" height="100">
                    </td>
                    <td>{{ $newsLetter->title }}</td>
                    <td> <a href="{{ $newsLetter->url }}" target="_blank"> {{ $newsLetter->url }} </a> </td>
                    <td>{{ $newsLetter->caption }}</td>
                    <td>{{ $newsLetter->description }}</td>
                    <td>{{ $newsLetter->date }}</td>
                    <td>
                        <!-- <div class="make-switch switch-mini has-switch">
                            <div class="switch-off switch-animate switch">
                                <input type="checkbox">
                                <span class="switch-left switch-mini">ON</span>
                                <label class="switch-mini">&nbsp;</label>
                                <span class="switch-right switch-mini">OFF</span>
                            </div>
                        </div> -->
                        <input type="checkbox" name="status" class="statusCheckbox" data-id="{{ $newsLetter->id }}" {{ ($newsLetter->active) ? 'checked="checked" ' : '' }} >
                    </td>
                    <td class="d-flex">
                        <a href="{{ route('newsletters-delete', [$newsLetter->id]) }}"><button class="btn btn-danger mr-2 mb-1">Delete</button></a>
                        <a href="{{ route('newsletters-edit', [$newsLetter->id]) }}"><button class="btn btn-primary">Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </div>
</div>
@stop