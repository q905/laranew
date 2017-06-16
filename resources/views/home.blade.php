@extends('layouts.welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Личный Профиль</div>

                <div class="panel-body">
                    Вы вошли как {{ Auth::user()->name }}!<br>
                    Ваш номер: {{ Auth::user()->id }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
