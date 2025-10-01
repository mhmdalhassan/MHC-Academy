<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:service-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:service-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $services = Service::latest()->get();
        return view('service.index', compact('services'));
    }

    public function create(): View
    {
        return view('service.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'paragraph' => 'nullable|string',
            'cards.*.title' => 'required|string|max:255',
            'cards.*.description' => 'nullable|string',
            'cards.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            // [{'cards.image','cards.tittle','description'}]=>
        ]);

        $data = $request->only('header', 'paragraph');

        
        $cards = [];
        if ($request->has('cards')) {
            foreach ($request->cards as $card) {
                $cardData = [
                    'title' => $card['title'],
                    'description' => $card['description'] ?? null,
                ];
                if (!empty($card['image'])) {
                    $cardData['image'] = $card['image']->store('services', 'public');
                }
                $cards[] = $cardData;
            }
        }
        $data['cards'] = $cards;

        Service::create($data);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function show(Service $service): View
    {
        return view('service.show', compact('service'));
    }

    public function edit(Service $service): View
    {
        return view('service.edit', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'paragraph' => 'nullable|string',
            'cards.*.title' => 'required|string|max:255',
            'cards.*.description' => 'nullable|string',
            'cards.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('header', 'paragraph');

        $cards = [];
        if ($request->has('cards')) {
            foreach ($request->cards as $card) {
                $cardData = [
                    'title' => $card['title'],
                    'description' => $card['description'] ?? null,
                ];
                if (!empty($card['image'])) {
                    $cardData['image'] = $card['image']->store('services', 'public');
                } else if (!empty($card['old_image'])) {
                    $cardData['image'] = $card['old_image'];
                }
                $cards[] = $cardData;
            }
        }
        $data['cards'] = $cards;

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
