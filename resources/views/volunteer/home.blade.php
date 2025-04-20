@extends('layouts.app')

@section('content')
<link href="{{ asset('styles/dash.css') }}" rel="stylesheet">

<div class="main_div">
        <h1> {{ Auth::guard('volunteer')->user()->name }}!</p> вошел как волонтер.</h1>
        <p>Организация:{{ Auth::guard('volunteer')->user()->organization->name }} </p>
        <h2>Привет,  {{ Auth::guard('volunteer')->user()->name }}!</p>
            Мы рады, что вы присоединились к нашей команде волонтёров. Ваша помощь бесценна!</h2>
        
            <h2>Теперь вы можете откликаться на запросы о помощи, общаться с пользователями и получать благодарности за вашу работу.</h2>
        
            <h2>Вместе мы делаем мир лучше! Если у вас есть вопросы, мы всегда на связи.</h2>
</div>
@endsection