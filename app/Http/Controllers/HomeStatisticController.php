<?php

namespace App\Http\Controllers;

use App\Models\HomeStatistic;
use Illuminate\Http\Request;

class HomeStatisticController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:home-statistic-list|home-statistic-create|home-statistic-edit|home-statistic-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:home-statistic-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:home-statistic-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:home-statistic-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $homeStatistics = HomeStatistic::latest()->paginate(5);
        return view('home_statistics.index', compact('homeStatistics'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('home_statistics.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'nullable|string',
            'cards' => 'required|array',
            'cards.*.card_number' => 'required|integer',
            'cards.*.card_name' => 'required|string',
            'cards.*.card_description' => 'required|string',
        ]);

        HomeStatistic::create($data);

        return redirect()->route('home-statistics.index')->with('success', 'Home statistic created successfully.');
    }


    public function show(HomeStatistic $homeStatistic)
    {
        return view('home_statistics.show', compact('homeStatistic'));
    }

    public function edit(HomeStatistic $homeStatistic)
    {
        // cards are already an array thanks to model casting
        return view('home_statistics.edit', compact('homeStatistic'));
    }



    public function update(Request $request, HomeStatistic $homeStatistic)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'nullable|string',
            'cards' => 'required|array',
            'cards.*.card_number' => 'required|integer',
            'cards.*.card_name' => 'required|string',
            'cards.*.card_description' => 'required|string',
        ]);

        $homeStatistic->update($data);

        return redirect()->route('home-statistics.index')->with('success', 'Home statistic updated successfully.');
    }


    public function destroy(HomeStatistic $homeStatistic)
    {
        $homeStatistic->delete();

        return redirect()->route('home-statistics.index')
            ->with('success', 'Home Statistic deleted successfully.');
    }
}
