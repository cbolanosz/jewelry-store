<?php

/* Author: Cristian Bolaños */

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('home.title').' - '.__('app.brand');

        return view('home.index')->with('viewData', $viewData);
    }
}
