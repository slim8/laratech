@extends('layouts.app')

@section('content')
    <h1>Add question</h1>
    <form method="POST" action="/questions" accept-charset="UTF-8" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleFormControlInput1">Question</label>
          <input type="text" class="form-control" name="question" id="exampleFormControlInput1" placeholder="Lorem ipsum dolor sit amet consectetur ?">
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlInput2">Note de question</label>
            <input type="text" class="form-control" name="score" id="exampleFormControlInput2" placeholder="2.5">
          </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Type</label>
          <select class="form-control" id="exampleFormControlSelect1" name="type">
            <option value="mono" selected>Mono</option>
            <option value="multiple">Multiple</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect2">Theme</label>
          <select  class="form-control" id="exampleFormControlSelect2" name="theme_id">
              @foreach ($themes as $theme)
                <option value="{{$theme->id}}" >{{$theme->nom}}</option>
              @endforeach

          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

  
      </form>



@endsection