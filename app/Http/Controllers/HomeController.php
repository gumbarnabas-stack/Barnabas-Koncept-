<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->take(6)->get();
        $featuredProjects = Portfolio::where('is_featured', true)->latest()->take(6)->get();

        return view('home', compact('services', 'featuredProjects'));
    }
}
