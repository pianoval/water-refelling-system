<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display all orders
    public function index()
    {
        $orders = Order::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Orders retrieved successfully.',
            'data' => $orders
        ]);
    }

    // Store a new order
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0',
            'delivery_address' => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
            'status' => 'nullable|in:Pending,Confirmed,Preparing,Out for Delivery,Delivered,Cancelled',
            'order_date' => 'nullable|date',
        ]);

        $order = Order::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Order created successfully.',
            'data' => $order
        ], 201);
    }

    // Display one order
    public function show(Order $order)
    {
        return response()->json([
            'success' => true,
            'message' => 'Order retrieved successfully.',
            'data' => $order
        ]);
    }

    // Update an order
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0',
            'delivery_address' => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
            'status' => 'required|in:Pending,Confirmed,Preparing,Out for Delivery,Delivered,Cancelled',
            'order_date' => 'nullable|date',
        ]);

        $order->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully.',
            'data' => $order
        ]);
    }

    // Delete an order
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order deleted successfully.'
        ]);
    }
}