<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(String $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function create()
    {
        
        return view('users.create');
    }

    public function store(Request $request)
    {


        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'phone_number' => 'required',
                'email' => 'required|email|unique:users',
            ]);

            // dd($validatedData['roles']);
            $password = Str::random(8);
            $validatedData['password'] = Hash::make($password);

            // Create the user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'address' => $validatedData['address'],
                'phone_number' => $validatedData['phone_number'],
                'password' => $validatedData['password'],

            ]);

            Mail::to($user->email)->send(new UserMail($user, $password));

            return redirect()->route('users.index')->with('success', 'User created successfully.Please check your email address to get your password');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage())->withInput();
        }
    }



    public function edit(User $user)
    {
      
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address' => 'required|string',
            'phone_number' => 'required|integer',

        ]);

      

        try {
            $user->fill([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);

            if ($request->has('password')) {
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();

            return redirect()->route('users.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update user.' . $e->getMessage())->withInput();
        }
    }



    // request to update the profile by users

    public function editProfile()
    {

        return view('users.edit-profile');
    }
    // update profile by users

    public function updateProfile(Request $request)
    {
        $userLogin = Auth::user();
        $user = User::findOrFail($userLogin->id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
    
        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete user.' . $e->getMessage());
        }
    }

}
