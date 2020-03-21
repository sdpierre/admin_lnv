@extends('welcome')

@section('content')
<h2>Bibliothèque de médias <button class="btn btn-primary"> Ajouter </button></h2>
<br>

<table class="table table-striped">
    <thead>
        <tr>
            <th width=30> <input type="checkbox"> </th>
            <th>Fichier</th>
            <th>Auteurs</th>
            <th>Téléversé sur</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> <input type="checkbox"> </td>
            <td>   
                <img src="https://asset.lemde.fr/newsletters/thumbnails/a-la-une.png" width="62" height="62" style="float:left; margin-right:10px;">
                <h4> <a href="#"> A la une </a> </h4>
                <p> alaune.jpg </p>
            </td>
            <td>Stanley</td>
            <td> <p> (Non attaché) </p>
                <a href="">Joindre</a>
            </td>
            <td>19/03/2020</td>
        </tr>
        <tr>
            <td><input type="checkbox"></td>
            <td>   
                <img src="https://asset.lemde.fr/newsletters/thumbnails/a-la-une.png" width="62" height="62" style="float:left; margin-right:10px;">
                <h4> <a href="#"> A la une </a> </h4>
                <p> alaune.jpg </p>
            </td>
            <td>Stanley</td>
            <td> <p> (Non attaché) </p>
                <a href="">Joindre</a>
            </td>
            <td>19/03/2020</td>
        </tr>
        <tr>
            <td><input type="checkbox"></td>
            <td>   
                <img src="https://asset.lemde.fr/newsletters/thumbnails/a-la-une.png" width="62" height="62" style="float:left; margin-right:10px;">
                <h4> <a href="#"> A la une </a> </h4>
                <p> alaune.jpg </p>
            </td>
            <td>Stanley</td>
            <td> <p> (Non attaché) </p>
                <a href="">Joindre</a>
            </td>
            <td>19/03/2020</td>
        </tr>
    </tbody>
</table>

@stop