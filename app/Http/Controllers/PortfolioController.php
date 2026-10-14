<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(9);

        return view('portfolio', compact('portfolios'));
    }

    public function show(Portfolio $portfolio)
    {
        return view('portfolio-show', compact('portfolio'));
    }
}
