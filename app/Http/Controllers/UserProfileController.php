<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();        

        // Validate user input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6', // Password is optional
        ]);

        // Update user profile
        $user = User::findOrFail($user->id);        

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Update the password only if it's provided
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
    }
}
