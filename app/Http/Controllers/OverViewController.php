<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;
class OverViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminData = Auth::user();
     return view("admin.overview",compact('adminData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request )
    {
        $adminData = Auth::user();
        $activities = Activity::get();
        $year = $request->input('year');
     
       $overview = Activity::where('year', $year)->get();
     
       if ($overview->isEmpty()) {
        return redirect()->back()->with('warning', 'No activities were found for the selected year. Please select a different year and try again.');
    }
       return view("admin.overview_result", compact('overview','adminData','activities','year'),[
           'selectedYear' => $year
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
