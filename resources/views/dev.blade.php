@extends('layouts.welcome')

@section('content')
<h1>Еще не сделано</h1>
<a href = "{{ url()->previous() }}">Назад</a>
@endsection
