<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActionsController extends Controller
{
    public function dashboard(): View|RedirectResponse
    {
        if ($this->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard');
    }

    public function cart(): View
    {
        return view('pages.cart');
    }
}
