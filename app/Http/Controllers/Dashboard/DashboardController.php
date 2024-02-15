<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        return view('dashboard.pages.admin.admin');
    }

    public function indexUser()
    {
        return view('dashboard.pages.user.user');
    }
}
