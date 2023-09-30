<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve a list of users
        $users = User::latest();

        if (!empty($request->get('keyword'))) {
            $users = $users->where('name', 'like', '%' . $request->get('keyword') . '%');
        }
        $users = $users->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show user creation form
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate user input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:Admin,User',
        ]);

        // Create a new user
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        // Redirect to the user listing page with a success message
        return redirect()->route('users')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // User edit
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate user input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6', // Password is optional
            'role' => 'required|in:Admin,User',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Update the password only if it's provided
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->role = $validatedData['role'];
        $user->save();

        return redirect()->route('users')->with('success', 'User data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // User delete
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully');    
    }
    
}
