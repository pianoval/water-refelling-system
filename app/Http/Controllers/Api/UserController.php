<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Users retrieved successfully.',
            'data' => $users
        ]);
    }

    // Store a new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
            'birthdate' => 'nullable|date',
            'profile_picture' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,staff,customer',
        ]);

        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'birthdate' => $request->birthdate,
            'profile_picture' => $request->profile_picture,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully.',
            'data' => $user->makeHidden(['password', 'remember_token'])
        ], 201);
    }

    // Display one user
    public function show(User $user)
    {
        return response()->json([
            'success' => true,
            'message' => 'User retrieved successfully.',
            'data' => $user->makeHidden(['password', 'remember_token'])
        ]);
    }

    // Update a user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
            'birthdate' => 'nullable|date',
            'profile_picture' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:admin,staff,customer',
        ]);

        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->birthdate = $request->birthdate;
        $user->profile_picture = $request->profile_picture;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully.',
            'data' => $user->makeHidden(['password', 'remember_token'])
        ]);
    }

    // Delete a user
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully.'
        ]);
    }
}