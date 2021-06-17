@extends('layouts.app')

@section('content')


    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a href="/questions" class="btn btn-default">Retour</a>
                    <h1>{{$question->question}}</h1>
                    <br>
                    <div>
                        @foreach ($question->reponses as $reponse)
                            @if ($question->type == 'mono')
                                <div class="form-check">
                                    <input class="form-check-input" value="{{$reponse->id}}" type="radio" name="rep" id="rep{{$reponse->id}}">
                                    <label class="form-check-label" for="rep{{$reponse->id}}">
                                        {{$reponse->rep}}
                                    </label>
                                </div>
                            @elseif ($question->type == 'multiple')
                                <div class="form-check">
                                    <input class="form-check-input" value="{{$reponse->id}}" type="checkbox" name="rep" id="rep{{$reponse->id}}">
                                    <label class="form-check-label" for="rep{{$reponse->id}}">
                                        {{$reponse->rep}}
                                    </label>
                                </div>
                            @endif

                        @endforeach
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </main>


@endsection
