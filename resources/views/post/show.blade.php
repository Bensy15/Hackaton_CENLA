<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Запрос о помощи от {{ $helppost->user_name }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <h4>{{ $helppost->heading }}</h4>
                        <span class="badge {{ $helppost->importance ? 'bg-danger' : 'bg-secondary' }}">
                            {{ $helppost->importance ? 'Срочно' : 'Обычный' }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <h5>Описание:</h5>
                        <p>{{ $helppost->txt }}</p>
                    </div>

                    @if($helppost->volunteer)
                    <div class="mb-3">
                        <h5>Назначенный волонтер:</h5>
                        <p>{{ $helppost->volunteer->name }} ({{ $helppost->volunteer->email }})</p>
                    </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <small class="text-muted">
                            Создано: {{ $helppost->created_at->format('d.m.Y H:i') }}
                        </small>
                        <div>
                            {{-- <a href="{{ route('post.edit', $helppost->id) }}" class="btn btn-sm btn-primary">
                                Редактировать
                            </a> --}}
                            <a href="{{ route('post.index') }}" class="btn btn-sm btn-secondary">
                                Назад к списку
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection