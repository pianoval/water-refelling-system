<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class InventoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INVENTORY OVERVIEW
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::latest()->get();

        $totalProducts = Product::count();

        $inStock = Product::where('stock', '>', 10)->count();

        $lowStock = Product::whereBetween('stock', [1, 10])->count();

        $outOfStock = Product::where('stock', '<=', 0)->count();

        return view(
            'admin.inventory.index',
            compact(
                'products',
                'totalProducts',
                'inStock',
                'lowStock',
                'outOfStock'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | LOW STOCK
    |--------------------------------------------------------------------------
    */

    public function lowStock()
    {
        $products = Product::whereBetween(
            'stock',
            [1, 10]
        )
        ->latest()
        ->get();

        $totalProducts = Product::count();

        $inStock = Product::where('stock', '>', 10)->count();

        $lowStock = Product::whereBetween('stock', [1, 10])->count();

        $outOfStock = Product::where('stock', '<=', 0)->count();

        return view(
            'admin.inventory.index',
            compact(
                'products',
                'totalProducts',
                'inStock',
                'lowStock',
                'outOfStock'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | OUT OF STOCK
    |--------------------------------------------------------------------------
    */

    public function outOfStock()
    {
        $products = Product::where(
            'stock',
            '<=',
            0
        )
        ->latest()
        ->get();

        $totalProducts = Product::count();

        $inStock = Product::where('stock', '>', 10)->count();

        $lowStock = Product::whereBetween('stock', [1, 10])->count();

        $outOfStock = Product::where('stock', '<=', 0)->count();

        return view(
            'admin.inventory.index',
            compact(
                'products',
                'totalProducts',
                'inStock',
                'lowStock',
                'outOfStock'
            )
        );
    }
}