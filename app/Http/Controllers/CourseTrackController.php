<?php

namespace App\Http\Controllers;

use App\Models\CourseTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseTrackController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:course-track-list|course-track-create|course-track-edit|course-track-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:course-track-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:course-track-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:course-track-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $courseTracks = CourseTrack::latest()->paginate(5);
        return view('course_tracks.index', compact('courseTracks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('course_tracks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'nullable|string',
            'cards' => 'required|array',
            'cards.*.image' => 'nullable|file|image|max:2048',   // file upload
            'cards.*.name' => 'required|string',
            'cards.*.image_icon' => 'nullable|string',           // SVG or icon class
            'cards.*.description' => 'required|string',
        ]);

        // Handle file uploads for each card
        $cards = $data['cards'];
        foreach ($cards as $i => $card) {
            if (isset($card['image']) && $request->hasFile("cards.$i.image")) {
                $path = $request->file("cards.$i.image")->store("course_tracks", "public");
                $cards[$i]['image'] = $path; // save relative path
            }
        }
        $data['cards'] = $cards;

        CourseTrack::create($data);

        return redirect()->route('course-tracks.index')->with('success', 'Course track created successfully.');
    }

    public function show(CourseTrack $courseTrack)
    {
        return view('course_tracks.show', compact('courseTrack'));
    }

    public function edit(CourseTrack $courseTrack)
    {
        // cards are already cast to array thanks to model
        return view('course_tracks.edit', compact('courseTrack'));
    }

    public function update(Request $request, CourseTrack $courseTrack)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'nullable|string',
            'cards' => 'required|array',
            'cards.*.image' => 'nullable|file|image|max:2048',
            'cards.*.name' => 'required|string',
            'cards.*.image_icon' => 'nullable|string',
            'cards.*.description' => 'required|string',
        ]);

        // Handle file uploads for each card
        $cards = $data['cards'];
        foreach ($cards as $i => $card) {
            if (isset($card['image']) && $request->hasFile("cards.$i.image")) {
                // delete old image if exists
                if (!empty($courseTrack->cards[$i]['image'])) {
                    Storage::disk('public')->delete($courseTrack->cards[$i]['image']);
                }
                $path = $request->file("cards.$i.image")->store("course_tracks", "public");
                $cards[$i]['image'] = $path;
            } elseif (isset($courseTrack->cards[$i]['image'])) {
                // keep old image if not replaced
                $cards[$i]['image'] = $courseTrack->cards[$i]['image'];
            }
        }
        $data['cards'] = $cards;

        $courseTrack->update($data);

        return redirect()->route('course-tracks.index')->with('success', 'Course track updated successfully.');
    }

    public function destroy(CourseTrack $courseTrack)
    {
        // delete uploaded images
        if (!empty($courseTrack->cards)) {
            foreach ($courseTrack->cards as $card) {
                if (!empty($card['image'])) {
                    Storage::disk('public')->delete($card['image']);
                }
            }
        }

        $courseTrack->delete();

        return redirect()->route('course-tracks.index')->with('success', 'Course track deleted successfully.');
    }
}
