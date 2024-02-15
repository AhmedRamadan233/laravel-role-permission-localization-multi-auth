<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleAbility;
use App\Traits\PermissionTrait;
use Illuminate\Http\Request;

class RolesController extends Controller
{


    // public function __construct()
    // {
    //     $this->authorizeResource(Role::class, 'role');    
    // }

    // use PermissionTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('dashboard.pages.roles.role' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        // $items = $this->items;
        // foreach($items as $item)
        // dd($item['roles.index']);
        return view('dashboard.pages.roles.create' , compact('roles') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
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
        $role_abilities = $role->roleAbilities()->pluck('type', 'ability')->toArray();
        return view('dashboard.pages.roles.edit', compact('role' , 'role_abilities'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
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
        Role::destroy($id);
        return redirect()
            ->route('role.index')
            ->with('success', 'Role deleted successfully');
    }
}