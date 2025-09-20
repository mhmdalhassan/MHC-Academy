<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:offer-list|offer-create|offer-edit|offer-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:offer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:offer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:offer-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $offers = Offer::latest()->paginate(5);

        return view('offers.index', compact('offers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('offers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean',
            'description' => 'nullable|string',
            'old_price' => 'nullable|numeric',
            'new_price' => 'nullable|numeric',
        ]);

        $data = $request->only(['name', 'is_active', 'description', 'old_price', 'new_price']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('offers', 'public');
        }

        Offer::create($data);

        return redirect()->route('offers.index')
            ->with('success', 'Offer created successfully.');
    }

    public function show(Offer $offer): View
    {
        return view('offers.show', compact('offer'));
    }

    public function edit(Offer $offer): View
    {
        return view('offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean',
            'description' => 'nullable|string',
            'old_price' => 'nullable|numeric',
            'new_price' => 'nullable|numeric',
        ]);

        $data = $request->only(['name', 'is_active', 'description', 'old_price', 'new_price']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($offer->image) {
                Storage::disk('public')->delete($offer->image);
            }
            $data['image'] = $request->file('image')->store('offers', 'public');
        }

        $offer->update($data);

        return redirect()->route('offers.index')
            ->with('success', 'Offer updated successfully.');
    }

    public function destroy(Offer $offer): RedirectResponse
    {
        if ($offer->image) {
            Storage::disk('public')->delete($offer->image);
        }

        $offer->delete();

        return redirect()->route('offers.index')
            ->with('success', 'Offer deleted successfully.');
    }
}
