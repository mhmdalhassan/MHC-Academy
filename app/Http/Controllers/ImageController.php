<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:image-list|image-create|image-edit|image-delete', ['only' => ['index','show']]);
        $this->middleware('permission:image-create', ['only' => ['create','store']]);
        $this->middleware('permission:image-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:image-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $images = Image::all();
        return view('image.index', compact('images'));
    }

    public function create()
    {
        return view('image.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $data['image'] = $file->storeAs('images', $filename, 'public');
        }

        Image::create($data);

        return redirect()->route('home-banner.index')->with('success', 'Image created successfully.');
    }

    public function show(Image $image)
    {
        return view('image.show', compact('image'));
    }

    public function edit(Image $image)
    {
        return view('image.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $data = $request->only(['title','description']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $data['image'] = $file->storeAs('images', $filename, 'public');
        }

        $image->update($data);

        return redirect()->route('home-banner.index')->with('success','Image updated successfully.');
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->route('home-banner.index')->with('success','Image deleted successfully.');
    }
}
