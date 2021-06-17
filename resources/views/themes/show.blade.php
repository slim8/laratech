@extends('layouts.app')

@section('content')
    <a href="/dashboard" class="btn btn-default">Retour</a>
    <h1>Test {{$theme->nom}}</h1>
    <br>
    <div>
        <form method="POST" action="/themes/getscore" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if (count($theme->questions))
            @foreach ($theme->questions as $question)
                
                @if (count($question->reponses))
                <h3>{{$question->question}}</h3>
                    @foreach ($question->reponses as $reponse)
                        @if ($question->type == 'mono')
                        <div class="form-check">
                            <input class="form-check-input" value="{{$reponse->id}}" type="radio" name="{{$question->id}}" id="rep{{$reponse->id}}">
                            <label class="form-check-label" for="rep{{$reponse->id}}">
                            {{$reponse->rep}}
                            </label>
                        </div>
                        @elseif ($question->type == 'multiple')
                        <div class="form-check">
                            <input class="form-check-input" value="{{$reponse->id}}" type="checkbox" name="{{$reponse->id}}" id="rep{{$reponse->id}}">
                            <label class="form-check-label" for="rep{{$reponse->id}}">
                            {{$reponse->rep}}
                            </label>
                        </div>
                        @endif
                    
                    @endforeach
                @endif
            @endforeach
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
    <hr>

@endsection