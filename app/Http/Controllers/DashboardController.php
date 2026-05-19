<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\StockMovement;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalProducts = Product::count();
        $totalStockMovements = StockMovement::count();
        $recentStockMovements = StockMovement::with('product')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        if ($user->role === 'admin') {
            $totalCategories = Category::count();
            $totalSuppliers = Supplier::count();

            $lowStockProducts = Product::whereColumn(
                'quantity',
                '<=',
                'min_stock'
            )->where('quantity', '>', 0)->get();

            $outOfStockProducts = Product::where(
                'quantity',
                0
            )->get();

            return view('dashboard', compact(
                'totalProducts',
                'totalCategories',
                'totalSuppliers',
                'totalStockMovements',
                'lowStockProducts',
                'outOfStockProducts',
                'recentStockMovements'
            ));
        } else {
            return view('dashboard.staff', compact(
                'totalProducts',
                'totalStockMovements',
                'recentStockMovements'
            ));
        }
    }
}