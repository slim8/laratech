@extends('layouts.app')

@section('content')
    <a href="/reponses/create"> <button type="button" class="btn btn-success">Ajout de reponses</button></a>
    <a href="/questions"> <button type="button" class="btn btn-danger">Go to questions</button></a>

    <table class="table">


    @foreach($reponses as $reponse)
            <tr>
                <th scope="row">{{$reponse->id}}</th>
                <td><a href="/questions/{{$reponse->question->id}}"> {{$reponse->question->question}}</a></td>
                <td><a href="/reponses/{{$reponse->id}}"> {{$reponse->rep}}</a></td>
                <td><form action="/reponses/{{$reponse->id}}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <a href="/reponses/{{$reponse->id}}/edit"> <button type="button" class="btn btn-success">Edit</button></a>
                </td>
            </tr>

    @endforeach
    </table>
    </ul>
@endsection
