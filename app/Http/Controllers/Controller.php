<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function isAdmin(): bool
    {
        return Auth::user()->role === 'A';
    }
}
