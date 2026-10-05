<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('quantity', 'Desc')->get();
        // dd($products);

        return response()->json([
            'status' => true,
            'data' => $products,
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'quantity' => ['required', 'integer', 'min:0'],
            'category_id' => ['integer', 'exists:categories,id']
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $available = true;
        if ($request->quantity == 0) {
            $available = false;
        }
        $product->available = $available;
        $product->save();
        return \response()->json([
            'status' => true,
            'data' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $available = true;
        if ($request->quantity == 0) {
            $available = false;
        }
        $product->available = $available;
        $product->save();
        return \response()->json([
            'status' => true,
            'data' => $product,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return \response()->json([
            'status' => true,
            'message' => 'تم حذف المنتج بنجاح',
        ], 200);
    }
}
