<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Portfolio::count(),
            'services' => Service::count(),
            'messages' => ContactMessage::count(),
            'unread' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentProjects = Portfolio::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentProjects'));
    }
}
