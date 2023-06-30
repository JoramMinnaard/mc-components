<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(): View
    {
        return view('pages.index');
    }

    public function tabs(): View
    {
        $jsonFile = base_path().'/app/Http/Controllers/data.json';
        $warhammer_products = json_decode(file_get_contents($jsonFile), true);

        return view('pages.tabs', compact('warhammer_products'));
    }

    public function accordion(): View
    {
        return view('pages.accordion');
    }
}
