<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() {
        return view('rioAdmin.dashboard.index');
    }
}