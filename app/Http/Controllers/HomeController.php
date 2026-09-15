<?php

/* Author: Cristian Bolaños */

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('home.title').' - '.__('app.brand');
        $viewData['topProducts'] = Product::topSelling(3);

        return view('home.index')->with('viewData', $viewData);
    }
}
