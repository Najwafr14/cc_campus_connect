<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id !== 3) {  // Only Tata Usaha (role_id = 3) can access
            abort(403);
        }

        $users = User::with(['role', 'prodi'])->latest()->get();
        $roles = Role::all();
        
        return view('users.index', compact('users', 'roles'));
    }

    public function updateRole(Request $request, User $user)
    {
        if (Auth::user()->role_id !== 3) {  // Only Tata Usaha (role_id = 3) can access
            abort(403);
        }

        $request->validate([
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user->update(['role_id' => $request->role_id]);

        return back()->with('success', 'Role pengguna berhasil diubah');
    }

    public function destroy(User $user)
    {
        if (Auth::user()->role_id !== 3) {  // Only Tata Usaha (role_id = 3) can access
            abort(403);
        }

        $user->delete();

        return back()->with('success', 'Pengguna berhasil dihapus');
    }

    public function create()
    {
        if (Auth::user()->role_id !== 3) {  // Only Tata Usaha (role_id = 3) can access
            abort(403);
        }

        $roles = Role::all();
        return view('users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        if (Auth::user()->role_id !== 3) {  // Only Tata Usaha (role_id = 3) can access
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan');
    }
    public function edit(User $user)
    {
        if (Auth::user()->role_id !== 3) {  // Only Tata Usaha (role_id = 3) can access
            abort(403);
        }

        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        if (Auth::user()->role_id !== 3) {  // Only Tata Usaha (role_id = 3) can access
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user->update($request->only('name', 'email', 'role_id'));

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui');
    }
    public function show(User $user)
    {
        if (Auth::user()->role_id !== 3) {  // Only Tata Usaha (role_id = 3) can access
            abort(403);
        }

        return view('users.show', compact('user'));
    }
}