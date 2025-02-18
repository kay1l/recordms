<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroes = Hero::all();
        return view ('clerk.hero_manage', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|',
        ]);
            $hero = new Hero();
            $hero->title = $request->input('title');
            $hero->description = $request->input('description');

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = date('YmdHi').$image->getClientOriginalName();
                $image->move(public_path('upload/hero_image'),$imageName);
                $hero->image = $imageName;
                $hero->status = true;
                
                $hero->save();
                return redirect()->back()->with('success', 'Hero Successfully Added!');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
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
    public function update(Request $request, $id)
    {
        $hero = Hero::findOrFail($id);
        $hero->status = $hero->status == 1 ? 0 : 1;
        $hero->save();
    
        return response()->json([
            'success' => true,
            'new_status' => $hero->status,
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
