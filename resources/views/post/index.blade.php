<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('layouts.app')
@vite('resources/css/app.css')
@section('content')

    <ul> 
        @foreach($helpposts as $helppost)
        <li>                                        
            <x-card  href="{{route('post.show', $helppost->id)}}">
                <h3>{{ $helppost ['name_user'] }}</h3>
            </x-card>
        </li> 
     @endforeach
    </ul>
    {{ $helpposts->links() }}
@endsection
