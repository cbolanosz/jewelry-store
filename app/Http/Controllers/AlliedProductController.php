<?php

/* Author: Cristian Bolaños */

namespace App\Http\Controllers;

use App\Util\AlliedProductUtil;
use Illuminate\View\View;

class AlliedProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('allied.title').' - '.__('app.brand');
        $viewData['products'] = AlliedProductUtil::getProducts();

        return view('allied.index')->with('viewData', $viewData);
    }
}
