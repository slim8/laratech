@extends('layouts.app')

@section('content')
    <h1>Modification de question</h1>
    <form method="POST" action="/questions/{{$question->id}}" accept-charset="UTF-8" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
          <label for="exampleFormControlInput1">Question</label>
          <input type="text" class="form-control" name="question" id="exampleFormControlInput1" value="{{$question->question}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Note de question</label>
            <input type="text" class="form-control" name="score" id="exampleFormControlInput2" value="{{$question->score}}">
          </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Type</label>
          <select class="form-control" id="exampleFormControlSelect1" name="type">
            <option value="mono" {{ ($question->type == 'mono') ? 'selected' : '' }}>Mono</option>
            <option value="multiple" {{ ($question->type == 'multiple') ? 'selected' : '' }}>Multiple</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Theme</label>
          <select  class="form-control" id="exampleFormControlSelect2" name="theme_id">
              @foreach ($themes as $theme)
                <option value="{{$theme->id}}" {{ ($question->theme->id == $theme->id) ? 'selected' : '' }}>{{$theme->nom}}</option>
              @endforeach

          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

  
      </form>



@endsection