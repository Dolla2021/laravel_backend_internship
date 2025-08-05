<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'products'])->get();
        return response()->json(['orders' => $orders]);
    }
    public function show(Order $order)
    {
        $order->load(['user', 'products']);
        return response()->json(['order' => $order]);
    }
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,processing,completed,cancelled'
        ]);
        $order->update($validated);
        return response()->json(['order' => $order]);
    }
}