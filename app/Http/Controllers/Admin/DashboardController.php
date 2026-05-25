<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalCategories = Category::count();
        $totalPartners = Partner::count();
        $totalTransactions = Transaction::count();
        $totalRevenue = Transaction::whereIn('status', ['success', 'Success', 'settlement'])->sum('total_price');

        // Recent transactions with event eager loaded
        $recentTransactions = Transaction::with('event')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalEvents',
            'totalCategories',
            'totalPartners',
            'totalTransactions',
            'totalRevenue',
            'recentTransactions'
        )); 
    }
}