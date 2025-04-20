<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Создать запрос о помощи</div>

                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf

                        <!-- Имя пользователя -->
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Ваше имя</label>
                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" 
                                   id="user_name" name="user_name" value="{{ old('user_name') }}" required>
                            @error('user_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Заголовок -->
                        <div class="mb-3">
                            <label for="heading" class="form-label">Заголовок запроса</label>
                            <input type="text" class="form-control @error('heading') is-invalid @enderror" 
                                   id="heading" name="heading" value="{{ old('heading') }}" required>
                            @error('heading')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Текст запроса -->
                        <div class="mb-3">
                            <label for="txt" class="form-label">Подробное описание</label>
                            <textarea class="form-control @error('txt') is-invalid @enderror" 
                                      id="txt" name="txt" rows="5" required>{{ old('txt') }}</textarea>
                            @error('txt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Выбор волонтера -->
                        <div class="mb-3">
                            <label for="volunteer_id" class="form-label">Выберите волонтера (необязательно)</label>
                            <select class="form-select @error('volunteer_id') is-invalid @enderror" 
                                    id="volunteer_id" name="volunteer_id">
                                <option value="">-- Не выбрано --</option>
                                @foreach(App\Models\Volunteer::all() as $volunteer)
                                    <option value="{{ $volunteer->id }}" 
                                        {{ old('volunteer_id') == $volunteer->id ? 'selected' : '' }}>
                                        {{ $volunteer->name }} ({{ $volunteer->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('volunteer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Создать запрос</button>
                        <a href="{{ route('post.index') }}" class="btn btn-secondary">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection