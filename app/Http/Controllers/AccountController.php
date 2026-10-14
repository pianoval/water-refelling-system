<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GENERIC ACCOUNT REDIRECT
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.account');
        }

        if ($user->role === 'staff') {
            return redirect()->route('staff.account');
        }

        return redirect()->route('customer.account');
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE ACCOUNT
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $user = Auth::user();

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
                'unique:users,email,' . $user->id,
            ],

            'age' => [
                'nullable',
                'integer',
                'min:1',
                'max:120',
            ],

            'birthdate' => [
                'nullable',
                'date',
            ],

            'phone_number' => [
                'nullable',
                'string',
                'max:30',
            ],

            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'profile_picture' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->birthdate = $request->birthdate;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;


        /*
        |--------------------------------------------------------------------------
        | PROFILE PICTURE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_picture')) {

            if (
                $user->profile_picture &&
                Storage::disk('public')->exists(
                    $user->profile_picture
                )
            ) {
                Storage::disk('public')->delete(
                    $user->profile_picture
                );
            }

            $path = $request
                ->file('profile_picture')
                ->store(
                    'profiles',
                    'public'
                );

            $user->profile_picture = $path;
        }


        $user->save();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT BASED ON ROLE
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'admin') {

            return redirect()
                ->route('admin.account')
                ->with(
                    'success',
                    'Account information updated successfully!'
                );
        }


        if ($user->role === 'staff') {

            return redirect()
                ->route('staff.account')
                ->with(
                    'success',
                    'Account information updated successfully!'
                );
        }


        return redirect()
            ->route('customer.account')
            ->with(
                'success',
                'Account information updated successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE PASSWORD
    |--------------------------------------------------------------------------
    */

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ]);


        $user->password = Hash::make(
            $request->password
        );

        $user->save();


        if ($user->role === 'admin') {

            return redirect()
                ->route('admin.account')
                ->with(
                    'success',
                    'Password updated successfully!'
                );
        }


        if ($user->role === 'staff') {

            return redirect()
                ->route('staff.account')
                ->with(
                    'success',
                    'Password updated successfully!'
                );
        }


        return redirect()
            ->route('customer.account')
            ->with(
                'success',
                'Password updated successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN ACCOUNT
    |--------------------------------------------------------------------------
    */

    public function adminAccount()
    {
        $user = Auth::user();

        return view(
            'admin.account.index',
            compact('user')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STAFF ACCOUNT
    |--------------------------------------------------------------------------
    */

    public function staffAccount()
    {
        $user = Auth::user();

        return view(
            'staff.account',
            compact('user')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER ACCOUNT
    |--------------------------------------------------------------------------
    */

    public function customerAccount()
    {
        $user = Auth::user();

        return view(
            'customer.account',
            compact('user')
        );
    }
}