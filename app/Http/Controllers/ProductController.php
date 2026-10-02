<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('quantity', 'Desc')->get();
        // dd($products);

        return view('product.index', compact('products'));
    }
    //   % a   
    // c   a  r 
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'quantity' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'integer', 'exists:categories,id']
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
        return redirect()->route('products');
    }


    public function available_products()
    {
        $products = Product::where('available', true)->get();
        return view('product.index', compact('products'));
    }


    public function search(Request $request)
    {
        $request->validate([
            'find' => ['string']
        ]);
        $products = Product::where('name', 'LIKE', '%' . $request->find . '%')->get();
        return view('product.index', compact('products'));
    }



    //   ابريق وكاسة متي 
    //    % كاسة   %

    // book
    // % oo %



    public function edit(Product $product)
    {

        return view('product.edit', compact('product'));
    }

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
        return redirect()->route('products');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('products');
    }

    //  Auth::user()
}
