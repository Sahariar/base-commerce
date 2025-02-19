<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return 'Admin Dashboard';
    }
    public function dashboard(){
        return 'Admin Area Dashboard';
    }
}
