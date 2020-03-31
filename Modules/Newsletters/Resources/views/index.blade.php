@extends('welcome')

@section('content')

<div class="row">
    <div class="col-sm-8">
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
                    <td>{{ $newsLetter->url }}</td>
                    <td>{{ $newsLetter->caption }}</td>
                    <td>{{ $newsLetter->description }}</td>
                    <td>{{ $newsLetter->title }}</td>
                    <td>
                        <!-- <div class="make-switch switch-mini has-switch">
                            <div class="switch-off switch-animate switch">
                                <input type="checkbox">
                                <span class="switch-left switch-mini">ON</span>
                                <label class="switch-mini">&nbsp;</label>
                                <span class="switch-right switch-mini">OFF</span>
                            </div>
                        </div> -->
                        <input type="checkbox" name="status" class="statusCheckbox" data-id="{{ $newsLetter->id }}" {{ ($newsLetter->status) ? 'checked="checked" ' : '' }} >
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
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form role="form" id="form1" method="POST" enctype="multipart/form-data" class="validate" novalidate="novalidate" action="{{ route('newsletters-store') }}">
                    {{csrf_field()}}
                    <div class="form-group"> <label class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" data-validate="required" required placeholder="Enter Title">
                    </div>
                    <div class="form-group"> <label class="control-label">Caption</label>
                        <input type="text" class="form-control" name="caption" data-validate="required"placeholder="Enter Caption">
                    </div>
                    <div class="form-group"> <label class="control-label">Description</label>
                        <input type="text" class="form-control" name="description" data-validate="required"placeholder="Enter Description">
                    </div>
                    <div class="form-group"> <label class="control-label">Url</label>
                        <input type="text" class="form-control" name="url" data-validate="required" placeholder="Enter Url">
                    </div>
                    <div class="form-group"> <label class="control-label">Photo</label>
                        <input type="file" class="form-control" name="photo" data-validate="required" accept="image/x-png,image/gif,image/jpeg" />
                    </div>
                    <div class="form-group"> <label class="control-label">Date and hours</label>
                        <input type="text" class="form-control" name="date" data-validate="required"placeholder="Select" Required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.statusCheckbox').on('change', function(){
            id = jQuery(this).data("id");
            jQuery.ajax({
                type: "GET", 
                url: "{{route('update-status')}}",
                data: {id:id}
            });
        });
    });
</script>
@stop