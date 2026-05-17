<?php

namespace App\Http\Controllers;

use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $totalProducts = Product::count();

            $lowStockProducts = Product::whereColumn(
                'quantity',
                '<=',
                'min_stock'
            )->get();

            $outOfStockProducts = Product::where(
                'quantity',
                0
            )->get();

            return view('dashboard.admin', compact(
                'totalProducts',
                'lowStockProducts',
                'outOfStockProducts'
            ));
        } else {
            // Staff dashboard - minimal data
            return view('dashboard.staff');
        }
    }
}