@extends('layouts.app')

@section('content')
    <a href="/dashboard" class="btn btn-default">Retour</a>
    <h1>Resultat</h1>
    <br>
   
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <hr>
        <p>Votre note est <h5>{{$note}} / {{$max}}</h5>.</p>
      </div>
    <hr>

@endsection