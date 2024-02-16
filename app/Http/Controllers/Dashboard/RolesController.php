<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleAbility;
use App\Models\User;
use App\Traits\AuthorizeAccess;
use App\Traits\HasRoles;
use App\Traits\PermissionTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RolesController extends Controller
{
    use AuthorizeAccess;
    public function index()
    {
        $this->authorizeAccess('roles.index');
        $roles = Role::with('abilities')->get();
        // dd( $roles );
        return view('dashboard.pages.roles.role', compact('roles'));   
    }

       
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorizeAccess('role.create');

        $roles = Role::all();
        return view('dashboard.pages.roles.create' , compact('roles') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorizeAccess('roles.store');

        $request->validate([
            'name' => 'required|string|max:255',
            'abilities' => 'required|array',
        ]);
    
        $role = Role::createWithAbilities($request);
        
        return redirect()
            ->route('role.index')
            ->with('success', 'Role created successfully');
    }
    
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $this->authorizeAccess('roles.edit');

        $role_abilities = $role->abilities()->pluck('type', 'ability')->toArray();
        return view('dashboard.pages.roles.edit', compact('role' , 'role_abilities'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $this->authorizeAccess('roles.update');

        $request->validate([
            'name' => 'required|string|max:255',
            'abilities' => 'required|array',
        ]);
        
        $role->updateWithAbilities($request);
        
        return redirect()
            ->route('role.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorizeAccess('roles.delete');

        Role::destroy($id);
        return redirect()
            ->route('role.index')
            ->with('success', 'Role deleted successfully');
    }
}
