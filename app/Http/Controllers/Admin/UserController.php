<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display only Staff and Customer users.
     * Admin users are hidden from User Management.
     */
    public function index()
    {
        $users = User::whereIn('role', ['staff', 'customer'])
            ->latest()
            ->get();

        return view(
            'admin.users.index',
            compact('users')
        );
    }


    /**
     * Show create user form.
     */
    public function create()
    {
        return view('admin.users.create');
    }


    /**
     * Store a new user.
     *
     * Admin, Staff, and Customer are allowed
     * when creating a new account.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'role' => [
                'required',
                'in:admin,staff,customer',
            ],
        ]);


        User::create([
            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),

            'role' => $request->role,
        ]);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User created successfully!'
            );
    }


    /**
     * Display a specific user.
     *
     * Admin accounts are not part of
     * the User Management list.
     */
    public function show(User $user)
    {
        if (
            strtolower(
                trim(
                    $user->role ?? ''
                )
            ) === 'admin'
        ) {
            return redirect()
                ->route('admin.users.index')
                ->with(
                    'error',
                    'Admin accounts are not part of User Management.'
                );
        }


        return view(
            'admin.users.show',
            compact('user')
        );
    }


    /**
     * Show edit form.
     *
     * Staff and Customer accounts can be edited.
     */
    public function edit(User $user)
    {
        /*
         * Existing Admin accounts cannot be edited.
         */
        if (
            strtolower(
                trim(
                    $user->role ?? ''
                )
            ) === 'admin'
        ) {

            return redirect()
                ->route('admin.users.index')
                ->with(
                    'error',
                    'Admin accounts cannot be edited.'
                );
        }


        return view(
            'admin.users.edit',
            compact('user')
        );
    }


    /**
     * Update a user's role.
     *
     * Staff or Customer can be changed into:
     * Admin, Staff, or Customer.
     */
    public function update(
        Request $request,
        User $user
    ) {

        /*
         * Existing Admin accounts cannot be edited.
         */
        if (
            strtolower(
                trim(
                    $user->role ?? ''
                )
            ) === 'admin'
        ) {

            return redirect()
                ->route('admin.users.index')
                ->with(
                    'error',
                    'Admin accounts cannot be edited.'
                );
        }


        /*
         * Allow all three roles when editing:
         * Admin, Staff, Customer.
         */
        $request->validate([
            'role' => [
                'required',
                'in:admin,staff,customer',
            ],
        ]);


        /*
         * Update only the user's role.
         */
        $user->update([
            'role' => $request->role,
        ]);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User role updated successfully!'
            );
    }


    /**
     * Delete a Staff or Customer user.
     *
     * Admin users cannot be deleted.
     */
    public function destroy(User $user)
    {
        /*
         * Prevent deleting any Admin account.
         */
        if (
            strtolower(
                trim(
                    $user->role ?? ''
                )
            ) === 'admin'
        ) {

            return redirect()
                ->route('admin.users.index')
                ->with(
                    'error',
                    'Admin accounts cannot be deleted.'
                );
        }


        /*
         * Delete Staff or Customer.
         */
        $user->delete();


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User deleted successfully!'
            );
    }
}