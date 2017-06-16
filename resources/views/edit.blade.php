@extends('layouts.welcome')
@section('content')
<div class="container">
	
	@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

     <form class="form-horizontal" method="POST" action='/update'>
		 {!! csrf_field() !!}
          <label class="control-label">Название</label>
          <input type="text" class="form-control"  name="title" value="{{ $album->title }}">
          <label class="control-label">Исполнитель</label>
          <input type="text" class="form-control"  name="artist" value="{{ $album->artist }}">
          <label class="control-label" >Описание</label>
          <textarea class="form-control" name = "descript">{{ $album->descript }}</textarea>
          
          <input type = "hidden" name = "id" value = "{{ $album->id }}">
          
          <input type="hidden" name = "user_id" value="{{ Auth::user()->id }}">
          
          <input class="btn btn-primary" type="submit" value="Сохранить">
         
    </form>
    
</div>
@endsection
