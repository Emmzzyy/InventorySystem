<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;

class ReportController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $movements = StockMovement::latest()->get();

        return view('reports.index',
            compact('products', 'movements'));
    }

    public function exportCSV()
    {
        $products = Product::all();

        $filename = "inventory_report.csv";

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' =>
                'attachment; filename="'.$filename.'"',
        ];

        $callback = function () use ($products) {

            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'ID',
                'Name',
                'SKU',
                'Price',
                'Quantity'
            ]);

            foreach ($products as $product) {

                fputcsv($file, [
                    $product->id,
                    $product->name,
                    $product->sku,
                    $product->unit_price,
                    $product->quantity
                ]);
            }

            fclose($file);
        };

        return response()->stream(
            $callback,
            200,
            $headers
        );
    }
}