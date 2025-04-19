@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    <p>Welcome, {{ Auth::guard('user')->user()->name }}!</p>
                    <p>Email: {{ Auth::guard('user')->user()->email }}</p>
                    <p>You are logged in as a regular user.</p>
                    
                    <!-- Дополнительный контент для пользователя -->
                    <div class="mt-4">
                        <h4>User Features:</h4>
                        <ul>
                            <li>Feature 1 for Users</li>
                            <li>Feature 2 for Users</li>
                            <li>Feature 3 for Users</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection