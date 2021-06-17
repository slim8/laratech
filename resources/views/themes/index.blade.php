@extends('layouts.app')

@section('content')
    <h1>Themes</h1>
    @if(count($themes) > 0)
    <ul class="list-group">
        

     
        @foreach($themes as $theme)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/themes/{{$theme->id}}">{{$theme->nom}}</a>
            <span class="badge badge-primary badge-pill">{{count($theme->questions)}} questions</span>
        </li>
        @endforeach
    </ul>
        {{$themes->links()}}
    @else
        <p>No theme found</p>
    @endif
@endsection