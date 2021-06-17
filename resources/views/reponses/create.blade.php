@extends('layouts.app')

@section('content')
    <h1>Add reponse</h1>
    <form method="POST" action="/reponses" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Reponse</label>
            <input type="text" class="form-control" name="rep" id="exampleFormControlInput1" placeholder="Lorem ipsum dolor sit amet consectetur ?">
        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect1">True or false</label>
            <select class="form-control" id="exampleFormControlSelect1" name="exact">
                <option value="0" selected>Fausse reponse</option>
                <option value="1">Valide</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Question</label>
            <select  class="form-control" id="exampleFormControlSelect2" name="question_id">
                @foreach ($questions as $question)
                    <option value="{{$question->id}}" >{{$question->question}}</option>
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>


    </form>



@endsection
