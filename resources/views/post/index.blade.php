@extends('layouts.app')

@section('content')

<div class="container">
    <p>{{ $greeting }}</p>
    @if($greeting == "Hello")
        <p>Hi from inside the if startement</p>
    @endif

    <ul> 
        @foreach($helpposts as $helppost)
        <li>                                          {{-- highlight --}}
            <x-card href="posts/ {{ $helppost ['id'] }}" :importance=" $helppost['skill']> ">
                <h3>{{ $helppost ['name_user'] }}</h3>
            </x-card>
        </li> 
     @endforeach
    </ul>
</div>
@endsection

{{-- <p>{{ $helppost['name_user'] }}</p>
<a href="posts/ {{ $helppost ['id'] }}">Детали</a> --}}