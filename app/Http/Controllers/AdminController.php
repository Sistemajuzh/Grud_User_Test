<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function Usuarios()
    {
       return view('Admin.AllUsuarios');
    }

    public function Test()
    {
        return 'Autenticado';
    }
}
