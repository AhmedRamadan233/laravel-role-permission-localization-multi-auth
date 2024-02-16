<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\AuthorizeAccess;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use AuthorizeAccess;
    public function indexAdmin()
    {
        // $this->authorizeAccess('dashboard.index.users.index');

        return view('dashboard.pages.admin.admin');
    }

    public function indexUser()
    {
        return view('dashboard.pages.user.user');
    }
}
