<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($request->hasFile('profile_photo')) {
            $validatedData['profile_photo'] = $request->file('profile_photo')->store('profile_picture', 'public');
        }

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'phone_number' => $validatedData['phone_number'],
            'address' => $validatedData['address'],
            'profile_photo' => $validatedData['profile_photo'],
            'role_id' => $validatedData['role_id'],
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|max:2048',
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $validatedData['profile_photo'] = $request->file('profile_photo')->store('profile_picture', 'public');
        }

        $user->update($validatedData);

        if ($request->password) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
