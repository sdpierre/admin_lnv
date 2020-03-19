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
            <tbody>
                <tr>
                    <td><img src="https://asset.lemde.fr/newsletters/thumbnails/a-la-une.png" width="100" height="100"></td>
                    <td>A la une</td>
                    <td>https://asset.lemde.fr/newsletters/a-la-une/2020-03-03.html</td>
                    <td>7 jours sur 7, à 8 h 30</td>
                    <td>Les titres du Lenouvelliste.com en un coup d’oeil.</td>
                    <td> 0 13 * * 1</td>
                    <td>
                        <div class="make-switch switch-mini has-switch">
                            <div class="switch-off switch-animate"><input type="checkbox"><span class="switch-left switch-mini">ON</span><label class="switch-mini">&nbsp;</label><span class="switch-right switch-mini">OFF</span></div>
                        </div>
                    </td>
                    <td>Delete</td>

                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-body">
                <form role="form" id="form1" method="post" class="validate" novalidate="novalidate">
                    <div class="form-group"> <label class="control-label">Title</label>
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field">
                    </div>
                    <div class="form-group"> <label class="control-label">Caption</label>
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field">
                    </div>
                    <div class="form-group"> <label class="control-label">Description</label>
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field">
                    </div>
                    <div class="form-group"> <label class="control-label">Url</label>
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field">
                    </div>
                    <div class="form-group"> <label class="control-label">Photo</label>
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field">
                    </div>
                    <div class="form-group"> <label class="control-label">Date and hours</label>
                        <input type="text" class="form-control" name="name" data-validate="required" data-message-required="This is custom message for required field." placeholder="Required Field">
                    </div>
                    <div class="form-group"> <button type="submit" class="btn btn-success">Save</button> <button type="reset" class="btn">Reset</button> </div>
            </div>
            </form>
        </div>
    </div>
</div>
@stop