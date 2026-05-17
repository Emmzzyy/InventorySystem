<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        $movements = StockMovement::latest()
            ->paginate(10);

        return view('movements.index',
            compact('movements'));
    }

    public function create()
    {
        $products = Product::all();

        return view('movements.create',
            compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'type' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $movement = StockMovement::create($request->all());

        $product = Product::find($request->product_id);

        if ($request->type == 'IN') {

            $product->quantity += $request->quantity;

        } else {

            $product->quantity -= $request->quantity;
        }

        $product->save();

        return redirect()->route('movements.index')
            ->with('success', 'Stock updated');
    }
}