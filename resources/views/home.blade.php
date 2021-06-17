@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <ul class="list-group">
                            @foreach($themes as $theme)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="/themes/{{$theme->id}}">{{$theme->nom}}</a>
                                <span class="badge badge-primary badge-pill">{{count($theme->questions)}}</span>
                            </li>
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
