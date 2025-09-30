<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FooterController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:footer-list|footer-create|footer-edit|footer-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:footer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:footer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:footer-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        // since only 1 footer should exist, no need for pagination
        $footers = Footer::all();

        return view('footer.index', compact('footers'))
            ->with('i', 0);
    }

    public function create(): View|RedirectResponse
    {
        // prevent creating more than one footer
        if (Footer::count() > 0) {
            return redirect()->route('footer.index')
                ->with('error', 'You can only have one footer entry. Edit the existing one instead.');
        }

        return view('footer.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'github' => 'nullable|url',
            'privacy_policy' => 'nullable|url',
            'terms_of_service' => 'nullable|url',
        ]);

        Footer::create($request->all());

        return redirect()->route('footer.index')
            ->with('success', 'Footer created successfully.');
    }

    public function show(Footer $footer): View
    {
        return view('footer.show', compact('footer'));
    }

    public function edit(Footer $footer): View
    {
        return view('footer.edit', compact('footer'));
    }

    public function update(Request $request, Footer $footer): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'github' => 'nullable|url',
            'privacy_policy' => 'nullable|url',
            'terms_of_service' => 'nullable|url',
        ]);

        $footer->update($request->all());

        return redirect()->route('footer.index')
            ->with('success', 'Footer updated successfully.');
    }

    public function destroy(Footer $footer): RedirectResponse
    {
        $footer->delete();

        return redirect()->route('footer.index')
            ->with('success', 'Footer deleted successfully.');
    }
}
