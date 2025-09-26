<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact form
     */
    public function index()
    {
        $products = Product::pluck('name', 'id');
        return view('contact-us', compact('products'));
    }

    /**
     * Show all contact requests in admin
     */
    public function adminRequests()
    {
        $requests = Contact::latest()->get(); // أحدث الرسائل أولاً
        return view('requests.index', compact('requests'));
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
            'subject' => 'required|string|max:255',  // product name
            'description' => 'nullable|string|max:1000',
        ]);

        $product = Product::where('name', $validated['subject'])->first();

        if (!$product) {
            return redirect()->back()->withErrors(['subject' => 'Invalid product selected']);
        }

        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'product_id' => $product->id,
            'category' => $product->category,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Your message has been saved. Thanks!');
    }

    /**
     * (Optional) AJAX method to filter products by category
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
