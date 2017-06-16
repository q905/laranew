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
<?php echo url()->current(); ?>
     <form class="form-horizontal" method="POST" action="{{ url('/store') }}">
		 {!! csrf_field() !!}
          <label class="control-label">Название</label>
          <input type="text" class="form-control"  name="title">
          <label class="control-label">Исполнитель</label>
          <input type="text" class="form-control"  name="artist">
          <label class="control-label" >Описание</label>
          <textarea class="form-control" name = "descript"></textarea>
          
          <input type="hidden" name = "user_id" value="{{ Auth::user()->id }}">
          <input type="hidden" name = "cur_url" value= "{{ $cur_url }}">
          
         <input class="btn btn-primary" type="submit" value="Создать">
         
    </form>
    
</div>
@endsection
