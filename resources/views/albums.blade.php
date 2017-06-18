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
     <table class = "table-striped table-hover" style="width: 100%;">
		 
		 <tr>
				<th style = "width: 50px">id</th>
				<th style = "width: 200px">Название</th>
				<th style = "width: 200px">Исполнитель</th>
				<th style = "width: 200px">Описание</th>
				<th style = "width: 50px">user_id</th>
				@if(Auth::check())
					<th style = "width: 50px"></th>
					<th style = "width: 50px"></th>
				@endif
		</tr>
		 
		 <?php 
		 
		 foreach($albums as $album){
			 echo "<tr>";
			 echo "<td>".$album->id."</td>
					<td>".$album->title."</td>
					<td>".$album->artist."</td>
					<td>".$album->descript."</td>
					<td>".$album->user_id."</td>";
					
			 if(Auth::check() && Auth::user()->id == $album->user_id){
				echo "<td id = 'up'><a href='".url('/edit/'.$album->id)."'><span class='glyphicon glyphicon-pencil'></span></a></td>
				<td id = 'del'><a href='".url('/delete/'.$album->id)."'><span class='glyphicon glyphicon-remove'></span></a></td>";
				
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
