<?php

namespace App\Http\Controllers;

use App\Models\InternalCourse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InternalCourseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:internal-course-list|internal-course-create|internal-course-edit|internal-course-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:internal-course-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:internal-course-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:internal-course-delete', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $internalCourses = InternalCourse::latest()->paginate(5);

        return view('internal_courses.index', compact('internalCourses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View|RedirectResponse
    {
        if (InternalCourse::count() > 0) {
            return redirect()->route('internal-courses.index')
                ->with('error', 'You can only have one internal course. Please edit or delete the existing one.');
        }

        return view('internal_courses.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'description' => 'nullable|string',
            'students_enrolled' => 'required|integer|min:0',
            'expert_instructors' => 'required|integer|min:0',
            'projects_built' => 'required|integer|min:0',
            'completion_rate' => 'required|numeric|min:0|max:100',
        ]);

        InternalCourse::create($request->all());

        return redirect()->route('internal-courses.index')
            ->with('success', 'Internal Course created successfully.');
    }

    public function show(InternalCourse $internalCourse): View
    {
        return view('internal_courses.show', compact('internalCourse'));
    }

    public function edit(InternalCourse $internalCourse): View
    {
        return view('internal_courses.edit', compact('internalCourse'));
    }

    public function update(Request $request, InternalCourse $internalCourse): RedirectResponse
    {
        $request->validate([
            'header' => 'required|string|max:255',
            'description' => 'nullable|string',
            'students_enrolled' => 'required|integer|min:0',
            'expert_instructors' => 'required|integer|min:0',
            'projects_built' => 'required|integer|min:0',
            'completion_rate' => 'required|numeric|min:0|max:100',
        ]);

        $internalCourse->update($request->all());

        return redirect()->route('internal-courses.index')
            ->with('success', 'Internal Course updated successfully.');
    }

    public function destroy(InternalCourse $internalCourse): RedirectResponse
    {
        $internalCourse->delete();

        return redirect()->route('internal-courses.index')
            ->with('success', 'Internal Course deleted successfully.');
    }
}

