@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/questions/create" class="btn btn-primary">Ajouter question</a>
                    <a href="/themes/create" class="btn btn-primary">Ajouter theme</a>
                    <h3>Gerer les tests</h3>
                    @if(count($questions) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($questions as $question)
                                <tr>
                                    <th scope="row">{{$question->id}}</th>
                                    <td><a href="/questions/{{$question->id}}">{{$question->question}}</a></td>
                                    <td>{{$question->type}}</td>
                                    <td> <a href="/questions/{{$question->id}}/edit" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Modifier</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </table>
                    @else
                        <p>You have no Questions xD
                        
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
