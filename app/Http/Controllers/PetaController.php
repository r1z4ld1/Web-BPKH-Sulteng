<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PetaController extends Controller
{
    public function index(): View
    {
        return view('pages.peta.index');
    }
}
