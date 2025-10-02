<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:hero-section-list|hero-section-create|hero-section-edit|hero-section-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:hero-section-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:hero-section-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:hero-section-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $heroSections = HeroSection::latest()->paginate(5);

        return view('hero_sections.index', compact('heroSections'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('hero_sections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'introduction' => 'nullable|string',
            'button1_name' => 'nullable|string|max:255',
            'button1_route' => 'nullable|string|max:255',
            'button2_name' => 'nullable|string|max:255',
            'button2_route' => 'nullable|string|max:255',
        ]);

        HeroSection::create($request->all());

        return redirect()->route('hero-sections.index')
            ->with('success', 'Hero Section created successfully.');
    }

    public function show(HeroSection $heroSection)
    {
        return view('hero_sections.show', compact('heroSection'));
    }

    public function edit(HeroSection $heroSection)
    {
        return view('hero_sections.edit', compact('heroSection'));
    }

    public function update(Request $request, HeroSection $heroSection)
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'introduction' => 'nullable|string',
            'button1_name' => 'nullable|string|max:255',
            'button1_route' => 'nullable|string|max:255',
            'button2_name' => 'nullable|string|max:255',
            'button2_route' => 'nullable|string|max:255',
        ]);

        $heroSection->update($request->all());

        return redirect()->route('hero-sections.index')
            ->with('success', 'Hero Section updated successfully.');
    }

    public function destroy(HeroSection $heroSection)
    {
        $heroSection->delete();

        return redirect()->route('hero-sections.index')
            ->with('success', 'Hero Section deleted successfully.');
    }
}
