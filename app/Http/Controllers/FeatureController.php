<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:feature-list|feature-create|feature-edit|feature-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:feature-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:feature-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:feature-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $features = Feature::latest()->paginate(5);

        return view('features.index', compact('features'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function featuresSection()
    {
        // Get only active features
        $features = Feature::where('is_active', true)->get();

        return view('home', compact('features')); // or the view where your section is
    }

    public function create(): View
    {
        return view('features.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'is_active']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('features', 'public');
        }

        Feature::create($data);

        return redirect()->route('features.index')
            ->with('success', 'Feature created successfully.');
    }

    public function show(Feature $feature): View
    {
        return view('features.show', compact('feature'));
    }

    public function edit(Feature $feature): View
    {
        return view('features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'is_active']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($feature->image) {
                Storage::disk('public')->delete($feature->image);
            }
            $data['image'] = $request->file('image')->store('features', 'public');
        }

        $feature->update($data);

        return redirect()->route('features.index')
            ->with('success', 'Feature updated successfully.');
    }

    public function destroy(Feature $feature): RedirectResponse
    {
        if ($feature->image) {
            Storage::disk('public')->delete($feature->image);
        }

        $feature->delete();

        return redirect()->route('features.index')
            ->with('success', 'Feature deleted successfully.');
    }
}
