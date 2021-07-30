<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitadoController extends Controller
{
    // Area Global
    public function index()
    {
        session()->flash('flash.banner', 'Únete a la familia
        TU RESULTADO ES NUESTRO RESULTADO!');
        session()->flash('flash.bannerStyle', 'success');
        // return $this->redirect('/');
        return view('Invitado.index');
    }

    public function tabla()
    {
       return view('Invitado.index');
    }
}
