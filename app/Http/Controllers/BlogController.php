<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:blog-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $blogs = Blog::latest()->paginate(5);

        return view('blogs.index', compact('blogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('blogs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $path,
        ]);

        return redirect()->route('blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog): View
    {
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog): View
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $blog->image;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
        }

        $blog->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $path,
        ]);

        return redirect()->route('blogs.index')
            ->with('success', 'Blog updated successfully');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        return redirect()->route('blogs.index')
            ->with('success', 'Blog deleted successfully');
    }
}
