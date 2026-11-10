<?php

/* Author: Cristian Bolaños */

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        abort_unless(in_array($locale, ['en', 'es'], true), 404);

        session()->put('locale', $locale);

        return redirect()->back();
    }
}
