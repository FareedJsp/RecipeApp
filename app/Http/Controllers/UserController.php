<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct() {

        $this->middleware(['auth']);
    }

    public function index(Request $request) {

        $this->authorize('viewAny', User::class);

        $search = $request->input('search');
        $role = $request->input('role');

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%");
        })->when($role, function ($query, $role) {
            return $query->role($role);
        })->paginate(10);

        $roles = Role::get();

    return view('user.index', compact('users', 'roles'));
    }

    public function create(){

        $this->authorize('create', User::class);

        $roles = Role::whereNotIn('name', ['SuperAdmin'])->get();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request) {

        $this->authorize('edit', User::class);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $user->assignRole($request->role);

        return redirect()->route('user')->with('success', 'User Created successfully.');
    }

    public function show(User $user) { 
        
        $this->authorize('view', $user);

        return view('user.show', compact('user'));
    }

    public function edit(User $user) {  
        
        if ($user->hasRole('SuperAdmin')) {
            $this->authorize('editSuperAdmin');
        } else {
            $this->authorize('edit', $user);
        }

        $currentUser = Auth()->user();

        if ($currentUser->hasRole('SuperAdmin')){
            $roles = Role::get();
        }else if($currentUser->hasRole('Admin')) {
            $roles = Role::whereNotIn('name', ['SuperAdmin'])->get();
        }else{
            $roles = Role::whereNotIn('name', ['SuperAdmin', 'Admin', 'Marketing'])->get();
        }

        $roleName = $user->getRoleNames()->first();

        return view('user.edit', compact('user', 'roles', 'roleName'));
    }

    public function update(Request $request, User $user) {

        $this->authorize('update', $user);

        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $data = $request->all();

        $user->update($data);

        $user->syncRoles($request->role);

        return redirect()->route('user.show', $user)->with('success', 'User Updated successfully.');
    }

    public function destroy(User $user) {

        if ($user->hasRole('SuperAdmin')) {
            $this->authorize('editSuperAdmin');
        } else {
            $this->authorize('delete', $user);
        }

        $user->delete();

        return redirect()->route('ingredient')->with('success', 'User deleted successfully.');
    }

}
