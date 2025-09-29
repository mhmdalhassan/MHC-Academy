<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // Updated courses method for frontend filtering
    public function courses(Request $request)
    {
        $q = $request->query('q', null);            // <-- define $q
        $category = $request->query('category', 'All');
        $level = $request->query('level', 'All');   // optional: if you want to keep level in view

        $query = Product::query();

        // Search by name or detail
        if ($q) {
            $query->where('name', 'like', '%' . $q . '%')
                ->orWhere('detail', 'like', '%' . $q . '%');
        }

        // Filter by category
        if ($category && $category !== 'All') {
            $query->where('category', $category);
        }

        // Filter by difficulty/level
        if ($level && $level !== 'All') {
            $query->where('difficulty', $level);
        }

        $query->orderBy('created_at', 'desc');

        $products = $query->paginate(12)->withQueryString();

        $categories = Product::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->orderBy('category')
            ->pluck('category')
            ->toArray();

        return view('course', compact('products', 'categories', 'q', 'category', 'level'));
    }

    public function description(Product $product): View
    {
        return view('course-description', compact('product'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'detail' => 'nullable|string',
            'category' => 'required|string',
            'duration' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'difficulty' => 'required|in:Beginner,Intermediate,Advanced',
            'lessons' => 'required|integer|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'enrolled_count' => 'nullable|integer|min:0',
            'welcome_video_url' => 'nullable|url',
            'overview_video_url' => 'nullable|url',
            'core_concepts' => 'nullable|array',  // expects array input
            'core_concepts.*' => 'string',
        ]);


        $data = $request->only([
            'name',
            'price',
            'detail',
            'category',
            'duration',
            'difficulty',
            'lessons',
            'rating',
            'enrolled_count',
            'welcome_video_url',
            'overview_video_url',
            'core_concepts'
        ]);


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'detail' => 'nullable|string',
            'category' => 'required|string',
            'duration' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'difficulty' => 'required|in:Beginner,Intermediate,Advanced',
            'lessons' => 'required|integer|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'enrolled_count' => 'nullable|integer|min:0',
            'welcome_video_url' => 'nullable|url',
            'overview_video_url' => 'nullable|url',
            'core_concepts' => 'nullable|array',  // expects array input
            'core_concepts.*' => 'string',
        ]);

        $data = $request->only([
            'name',
            'price',
            'detail',
            'category',
            'duration',
            'difficulty',
            'lessons',
            'rating',
            'enrolled_count',
            'welcome_video_url',
            'overview_video_url',
            'core_concepts'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
