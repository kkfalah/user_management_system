<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => count(User::all()), 
            'totalAdmins' => count(User::where('role', 'Admin')->get()),
            'totalRegular' => count(User::where('role', 'User')->get()),
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function myaccount() {
        $user = auth()->user();
        return view('admin.myaccount.show', compact('user'));
    }

    public function myaccountEdit()
    {
        $user = auth()->user();
        return view('admin.myaccount.edit', compact('user'));
    }

    public function myaccountUpdate(Request $request)
    {
        $user = auth()->user();        

        // Validate user input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6', // Password is optional
            'role' => 'required|in:Admin,User',
        ]);

        $user = User::findOrFail($user->id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Update the password only if it's provided        
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->role = $validatedData['role'];
        $user->save();

        return redirect()->route('myaccount')->with('success', 'Profile updated successfully');
    }
}
