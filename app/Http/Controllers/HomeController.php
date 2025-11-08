<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\MenuItem;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::where('is_active', true)
            ->orderBy('order')
            ->get();
        
        $advantages = Advantage::where('is_active', true)
            ->orderBy('order')
            ->get();

        return Inertia::render('Welcome', [
            'menuItems' => $menuItems,
            'advantages' => $advantages,
        ]);
    }
}


