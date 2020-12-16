<?php

namespace App\Http\Controllers;

class TriController extends Controller
{
    public function tri ()
    {
        $table = jeux::orderBy('nom')->get();
    }
}
