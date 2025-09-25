<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Show form
    public function index()
    {
        $categories = Product::select('category')->distinct()->pluck('category');
        return view('contact-us', compact('categories'));
    }

    // Submit form
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:30',
            'category' => 'required|string',
            'product_id' => 'nullable|exists:products,id',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Your contact has been saved!');
    }

    // AJAX to get products by category
    public function getProducts(Request $request)
    {
        $category = $request->query('category');
        $products = Product::where('category', $category)->pluck('name', 'id');
        return response()->json($products);
    }
}
