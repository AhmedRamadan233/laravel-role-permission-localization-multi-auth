<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesOfUsers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $RolesOfUsers = RoleUser::with('user' , 'role')->get();
        return view('dashboard.pages.roles_of_users.index' , compact('RolesOfUsers') );
    }
    /**
     * Show the form for creating a new resource.
     */
    public function RoleUserCreate()
    {
        $roles = Role::all();
        $users = User::all();

        return view('dashboard.pages.roles_of_users.create' , compact('users' , 'roles') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required|exists:users,id',
            'role' => 'required|exists:roles,id',
        ]);

        DB::table('role_user')->insert([
            'user_id' => $request->input('user'),
            'role_id' => $request->input('role'),
        ]);

        return redirect()->route('role_user.index')->with('success', 'Role assigned successfully!');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {      
        $roleUser = RoleUser::findOrFail($id);
        $roles = Role::all();
        $users = User::all();
        return view('dashboard.pages.roles_of_users.edit', compact('roleUser', 'users', 'roles'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user' => 'required|exists:users,id',
            'role' => 'required|exists:roles,id',
        ]);
    
        $roleUser = RoleUser::findOrFail($id);
        $roleUser->user_id = $request->input('user');
        $roleUser->role_id = $request->input('role');
        $roleUser->save();

        return redirect()->route('role_user.index')->with('success', 'Role updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        RoleUser::destroy($id);
        return redirect()
            ->route('role_user.index')
            ->with('success', 'Role deleted successfully');
    }
}
