<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Product;

class InventoryController extends Controller
{
    /**
     * Display inventory and stock monitoring.
     */
    public function index()
    {
        $products = Product::latest()->get();

        $totalProducts = Product::count();

        $totalStock = Product::sum('stock');

        $lowStock = Product::where('stock', '>', 0)
            ->where('stock', '<=', 10)
            ->count();

        $outOfStock = Product::where('stock', '<=', 0)
            ->count();

        return view(
            'staff.inventory.index',
            compact(
                'products',
                'totalProducts',
                'totalStock',
                'lowStock',
                'outOfStock'
            )
        );
    }
}