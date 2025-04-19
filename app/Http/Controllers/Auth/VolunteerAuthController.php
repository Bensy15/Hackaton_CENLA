<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class VolunteerAuthController extends Controller
{
    public function showRegistrationForm()
    {
        $organizations = Organization::all();
        return view('auth.volunteer-register', compact('organizations'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:volunteers',
            'organization_id' => 'required|exists:organizations,id',
            'organization_code' => 'required|exists:organizations,code',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // Проверка, что код организации соответствует выбранной организации
        $organization = Organization::findOrFail($request->organization_id);
        if ($organization->code !== $request->organization_code) {
            return back()->withErrors(['organization_code' => 'Неверный код организации']);
        }

        $volunteer = Volunteer::create([
            'name' => $request->name,
            'email' => $request->email,
            'organization_id' => $request->organization_id,
            'password' => Hash::make($request->password),
        ]);

        auth()->guard('volunteer')->login($volunteer);

        return redirect()->route('home');
    }
}