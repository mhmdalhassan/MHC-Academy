<?php

namespace App\Http\Controllers;

use App\Models\StudentReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentReviewController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:student-review-list|student-review-create|student-review-edit|student-review-delete', ['only' => ['index','show']]);
        $this->middleware('permission:student-review-create', ['only' => ['create','store']]);
        $this->middleware('permission:student-review-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:student-review-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $studentReviews = StudentReview::latest()->paginate(5);
        return view('students.index', compact('studentReviews'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'rate' => 'required|numeric|min:0|max:5',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('student_reviews', 'public');
        }

        StudentReview::create($data);

        return redirect()->route('student-reviews.index')
            ->with('success','Student review created successfully.');
    }

    public function show(StudentReview $studentReview)
    {
        return view('students.show', compact('studentReview'));
    }

    public function edit(StudentReview $studentReview)
    {
        return view('students.edit', compact('studentReview'));
    }

    public function update(Request $request, StudentReview $studentReview)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'rate' => 'required|numeric|min:0|max:5',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($studentReview->image) {
                Storage::disk('public')->delete($studentReview->image);
            }
            $data['image'] = $request->file('image')->store('student_reviews', 'public');
        }

        $studentReview->update($data);

        return redirect()->route('student-reviews.index')
            ->with('success','Student review updated successfully.');
    }

    public function destroy(StudentReview $studentReview)
    {
        if ($studentReview->image) {
            Storage::disk('public')->delete($studentReview->image);
        }

        $studentReview->delete();

        return redirect()->route('student-reviews.index')
            ->with('success','Student review deleted successfully.');
    }
}