<?php

namespace App\Http\Controllers\backend\admin;

use Illuminate\Http\Request;
use App\Http\Models\dataUsers;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function indexUser() {
        $users = dataUsers::all();
        return view('backend.layouts.master', compact('users'));
    }
}