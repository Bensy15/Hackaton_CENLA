@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (Route::has('login'))
                        <div class="text-center">
                            <h4>Welcome to our application!</h4>
                            <p class="mt-3">
                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                <a href="{{ route('user.register') }}" class="btn btn-secondary">Register as User</a>
                                <a href="{{ route('volunteer.register') }}" class="btn btn-info">Register as Volunteer</a>
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection