<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\AuthorizeAccess;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use AuthorizeAccess;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorizeAccess('user.index');
        $users = User::all();
        return view('dashboard.pages.user.get_all_users' , compact('users') );
    }
    public function destroy($id)
    {
        $this->authorizeAccess('user.destroy');
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'user deleted successfully.');
    }
}
