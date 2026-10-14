<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display all products.
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view(
            'staff.products.index',
            compact('products')
        );
    }


    /**
     * Show create form.
     */
    public function create()
    {
        return view(
            'staff.products.create'
        );
    }


    /**
     * Store new product.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | IMAGE
        |--------------------------------------------------------------------------
        */

        $imagePath = null;


        if ($request->hasFile('image')) {

            $imagePath =
                $request
                    ->file('image')
                    ->store(
                        'products',
                        'public'
                    );
        }


        /*
        |--------------------------------------------------------------------------
        | CREATE PRODUCT
        |--------------------------------------------------------------------------
        */

        Product::create([

            'name' =>
                $request->name,

            'category' =>
                $request->category,

            'description' =>
                $request->description,

            'price' =>
                $request->price,

            'stock' =>
                $request->stock,

            'image' =>
                $imagePath,

        ]);


        return redirect()
            ->route(
                'staff.products.index'
            )
            ->with(
                'success',
                'Product added successfully!'
            );
    }


    /**
     * Show one specific product.
     */
    public function show(Product $product)
    {
        return view(
            'staff.products.show',
            compact('product')
        );
    }


    /**
     * Show edit form.
     */
    public function edit(Product $product)
    {
        return view(
            'staff.products.edit',
            compact('product')
        );
    }


    /**
     * Update product.
     */
    public function update(
        Request $request,
        Product $product
    ) {

        $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $product->image &&
                Storage::disk('public')
                    ->exists(
                        $product->image
                    )
            ) {

                Storage::disk('public')
                    ->delete(
                        $product->image
                    );
            }


            // Store new image
            $product->image =
                $request
                    ->file('image')
                    ->store(
                        'products',
                        'public'
                    );
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE PRODUCT
        |--------------------------------------------------------------------------
        */

        $product->name =
            $request->name;

        $product->category =
            $request->category;

        $product->description =
            $request->description;

        $product->price =
            $request->price;

        $product->stock =
            $request->stock;


        $product->save();


        return redirect()
            ->route(
                'staff.products.index'
            )
            ->with(
                'success',
                'Product updated successfully!'
            );
    }


    /**
     * Delete product.
     */
    public function destroy(Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | DELETE IMAGE
        |--------------------------------------------------------------------------
        */

        if (
            $product->image &&
            Storage::disk('public')
                ->exists(
                    $product->image
                )
        ) {

            Storage::disk('public')
                ->delete(
                    $product->image
                );
        }


        /*
        |--------------------------------------------------------------------------
        | DELETE PRODUCT
        |--------------------------------------------------------------------------
        */

        $product->delete();


        return redirect()
            ->route(
                'staff.products.index'
            )
            ->with(
                'success',
                'Product deleted successfully!'
            );
    }
}