@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Volunteer Dashboard</div>

                <div class="card-body">
                    <p>Welcome, {{ Auth::guard('volunteer')->user()->name }}!</p>
                    <p>Email: {{ Auth::guard('volunteer')->user()->email }}</p>
                    <p>Organization: {{ Auth::guard('volunteer')->user()->organization->name }}</p>
                    <p>You are logged in as a volunteer.</p>
                    
                    <!-- Дополнительный контент для волонтера -->
                    <div class="mt-4">
                        <h4>Volunteer Features:</h4>
                        <ul>
                            <li>Feature A for Volunteers</li>
                            <li>Feature B for Volunteers</li>
                            <li>Feature C for Volunteers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection