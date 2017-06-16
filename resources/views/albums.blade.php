@extends('layouts.welcome')
@section('content')

<span>&nbsp;&nbsp;&nbsp;<a href = "{{ url('/') }}">Все записи</a></span>
@if(Auth::check())
    
    <span>&nbsp;&nbsp;&nbsp;<a href = "{{ url('/user') .'/'. Auth::user()->id }}">Мои записи</a></span>
    <span>&nbsp;&nbsp;&nbsp;<a href="{{ url('/create') }}">+Добавить</a></span>
    <span>&nbsp;&nbsp;&nbsp;<a href="javascript: alert('test deploy')">Test deploy</a></span>
    
@endif
    
    <br><br>

     <table class = "table-striped table-hover" style="width: 100%; height:300px">
		 
		 <tr>
				<th>id</th>
				<th>Название</th>
				<th>Исполнитель</th>
				<th>Описание</th>
				<th>user_id</th>
				@if(Auth::check())
					<th></th>
					<th></th>
				@endif
		</tr>
		 
		 <?php 
		 
		 foreach($albums as $album){
			 echo "<tr>";
			 echo "<td>".$album->id."</td><td>".$album->title."</td><td>".$album->artist."</td><td>".$album->descript."</td><td>".$album->user_id."</td>";
			 if(Auth::check() && Auth::user()->id == $album->user_id){
				echo "<td><a href='".url('/delete/'.$album->id)."'>Удалить</a></td>"."<td><a href='".url('/edit/'.$album->id)."'>Изменить</a></td>";
			}
			 echo "</tr>";
		 }
		 
		 
		 
		 ?>
		
	</table>
		 
		 <?php echo "<div style='text-align:center'>".$albums->render()."</div>"; ?>

@endsection
