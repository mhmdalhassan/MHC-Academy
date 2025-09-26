<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Show the contact form
     */
    public function index()
    {
        // Fetch all products as id => name (for subject input)
        $products = Product::pluck('name', 'id');

        return view('contact-us', compact('products'));
    }

    /**
     * Handle contact form submission
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|regex:/^\+?[0-9]+$/|max:20',
            'subject' => 'required|string|max:255',  // product name instead of ID
            'description' => 'nullable|string|max:1000',
        ]);

        // Look up product by name
        $product = Product::where('name', $validated['subject'])->first();

        // fallback if product not found (shouldn't happen if dropdown is used)
        if (!$product) {
            return redirect()->back()->withErrors(['subject' => 'Invalid product selected']);
        }

        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'product_id' => $product->id,      // still keep product_id link
            'category' => $product->category,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Your message has been saved. Thanks!');
    }

    /**
     * (Optional) AJAX method to filter products by category
     * Not used now since you removed category from form,
     * but kept for flexibility.
     */
    public function getProducts(Request $request)
    {
        $category = $request->query('category');

        if ($category === null || $category === 'all') {
            $products = Product::pluck('name', 'id');
        } else {
            $products = Product::where('category', $category)->pluck('name', 'id');
        }

        return response()->json($products);
    }
}
