<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $request->all();

        $product = Product::where('id', $request->product_id)->first();

        if (!$product) {
            return response()->json([
                'message' => 'Product Not Found'
            ], 400);
        }

        if ($product->available_stock >= $request->quantity) {
            $product->available_stock = $product->available_stock - $request->quantity;

            $product->save();

            return response()->json([
                'message' => 'You have successfully ordered this product.'
            ], 201);
        }

        return response()->json([
            'message' => 'Failed to order this product due to unavailability of the stock'
        ], 400);

    }
}
