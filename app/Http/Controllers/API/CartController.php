<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api'); // Require JWT authentication
    }

    public function getCart()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->firstOrCreate(
            ['user_id' => $user->id],
            ['items' => []]
        );
        return response()->json(['cart' => $cart->items ?? []], 200);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|string',
            'selectedColor' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'integer|min:1',
            'image' => 'nullable|string', // Include image if used in Cart.jsx
        ]);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->firstOrCreate(
            ['user_id' => $user->id],
            ['items' => []]
        );
        $items = $cart->items ?? [];

        $newItem = $request->only(['id', 'name', 'selectedColor', 'price', 'image']);
        $newItem['quantity'] = $request->input('quantity', 1);

        // Check if item with same id and selectedColor exists
        $existingIndex = array_search(
            true,
            array_map(fn($item) => $item['id'] == $newItem['id'] && $item['selectedColor'] == $newItem['selectedColor'], $items)
        );

        if ($existingIndex !== false) {
            $items[$existingIndex]['quantity'] += $newItem['quantity'];
        } else {
            $items[] = $newItem;
        }

        $cart->update(['items' => $items]);
        return response()->json([
            'cart' => $cart->items,
            'message' => "{$newItem['name']} has been added to your cart"
        ], 200);
    }

    public function removeFromCart(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'selectedColor' => 'required|string',
        ]);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart || empty($cart->items)) {
            return response()->json(['message' => 'Cart is empty'], 404);
        }

        $items = array_filter(
            $cart->items,
            fn($item) => !($item['id'] == $request->id && $item['selectedColor'] == $request->selectedColor)
        );
        $cart->update(['items' => array_values($items)]);

        return response()->json([
            'cart' => $cart->items,
            'message' => 'Item removed from cart'
        ], 200);
    }

    public function updateCartQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'selectedColor' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart || empty($cart->items)) {
            return response()->json(['message' => 'Cart is empty'], 404);
        }

        $items = array_map(function ($item) use ($request) {
            if ($item['id'] == $request->id && $item['selectedColor'] == $request->selectedColor) {
                $item['quantity'] = $request->quantity;
            }
            return $item;
        }, $cart->items);

        $cart->update(['items' => $items]);
        return response()->json([
            'cart' => $cart->items,
            'message' => 'Cart quantity updated'
        ], 200);
    }
}