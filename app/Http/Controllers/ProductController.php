<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;

class ProductController extends Controller
{
    public function save(Request $request)
    {
        $productName = $request->input('productName');
        $quantity = $request->input('quantityInStock');
        $price = $request->input('pricePerItem');

        Product::create([
            'product_name' => $productName,
            'quantity' => $quantity,
            'price' => $price
        ]);

        return response()->json(Product::all());
    }

    public function viewAll()
    {
        return response()->json(Product::all());
    }
}
