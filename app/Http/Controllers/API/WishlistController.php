<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    public function getWishlist()
    {
        try {
            $user = Auth::user();
            $wishlistItems = Wishlist::where('user_id', $user->id)
                ->with('product')
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->product_id,
                        'name' => $item->product->name,
                        'price' => $item->product->price,
                        'image' => $item->product->image,
                        'selectedColor' => $item->selected_color,
                    ];
                });

            return response()->json(['wishlist' => $wishlistItems], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching wishlist: ' . $e->getMessage());
            return response()->json(['message' => 'Error fetching wishlist'], 500);
        }
    }

    public function addToWishlist(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer|exists:products,id',
                'selectedColor' => 'required|string',
                'name' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'required|string',
            ]);

            $user = Auth::user();
            $wishlistItem = Wishlist::where('user_id', $user->id)
                ->where('product_id', $request->id)
                ->where('selected_color', $request->selectedColor)
                ->first();

            if ($wishlistItem) {
                return response()->json(['message' => 'Item already in wishlist'], 200);
            }

            Wishlist::create([
                'user_id' => $user->id,
                'product_id' => $request->id,
                'selected_color' => $request->selectedColor,
            ]);

            return response()->json(['message' => 'Item added to wishlist'], 200);
        } catch (\Exception $e) {
            Log::error('Error adding to wishlist: ' . $e->getMessage());
            return response()->json(['message' => 'Error adding item to wishlist'], 500);
        }
    }

    public function removeFromWishlist(Request $request, $id)
    {
        try {
            $request->validate([
                'selectedColor' => 'required|string',
            ]);

            $user = Auth::user();
            $wishlistItem = Wishlist::where('user_id', $user->id)
                ->where('product_id', $id)
                ->where('selected_color', $request->selectedColor)
                ->first();

            if (!$wishlistItem) {
                return response()->json(['message' => 'Item not found in wishlist'], 404);
            }

            $wishlistItem->delete();
            return response()->json(['message' => 'Item removed from wishlist'], 200);
        } catch (\Exception $e) {
            Log::error('Error removing wishlist item: ' . $e->getMessage());
            return response()->json(['message' => 'Error removing item from wishlist'], 500);
        }
    }
}