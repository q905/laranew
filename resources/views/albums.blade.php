@extends('layouts.welcome')

@section('left_menu')
<p><a href = "{{ url('/') }}">Все записи</a></p>
@if(Auth::check())
    
    <p><a href = "{{ url('/user') .'/'. Auth::user()->id }}">Мои записи</a></p>
    <p><a href="{{ url('/create') }}">+Добавить</a></p>
    <p><a href="javascript: alert('test deploy')">Test deploy</a></p>
    
@endif
    
@endsection

@section('content')
<div class = "tbl">
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
			} else {
				echo "<td>&nbsp;</td><td>&nbsp;</td>";
			}
			 echo "</tr>";
		 }
		 
		 
		 
		 ?>
		
	</table>
		 </div>
		 <div class = "pag" style='text-align:center'>
			 <?php echo $albums->render(); ?>
		 </div>

@endsection
