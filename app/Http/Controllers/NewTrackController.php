<?php

namespace App\Http\Controllers;

use App\Models\NewTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewTrackController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:new-track-list|new-track-create|new-track-edit|new-track-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:new-track-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:new-track-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:new-track-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $newTracks = NewTrack::latest()->get(); // ✅ pass to view
        return view('new_tracks.index', compact('newTracks'));
    }

    public function create()
    {
        return view('new_tracks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'points' => 'required|array|max:3',
            'points.*' => 'required|string',
        ]);

        $data = $request->only(['title', 'introduction', 'points']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('new_tracks', 'public');
        }

        NewTrack::create($data);

        return redirect()->route('new-tracks.index')->with('success', 'Track created successfully.');
    }

    public function show(NewTrack $newTrack)
    {
        return view('new_tracks.show', ['track' => $newTrack]);
    }

    public function edit(NewTrack $newTrack)
    {
        return view('new_tracks.edit', ['track' => $newTrack]);
    }

    public function update(Request $request, NewTrack $newTrack)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'points' => 'required|array|max:3',
            'points.*' => 'required|string',
        ]);

        $data = $request->only(['title', 'introduction', 'points']);

        if ($request->hasFile('image')) {
            if ($newTrack->image) {
                Storage::disk('public')->delete($newTrack->image);
            }
            $data['image'] = $request->file('image')->store('new_tracks', 'public');
        }

        $newTrack->update($data);

        return redirect()->route('new-tracks.index')->with('success', 'Track updated successfully.');
    }

    public function destroy(NewTrack $newTrack)
    {
        if ($newTrack->image) {
            Storage::disk('public')->delete($newTrack->image);
        }

        $newTrack->delete();

        return redirect()->route('new-tracks.index')->with('success', 'Track deleted successfully.');
    }
}
