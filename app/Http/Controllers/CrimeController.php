<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $categories = Category::all();
        // return view('home', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view("addCrime", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'media' => ['required', 'file', 'mimetypes:image/*,video/*'],
            'text' => ['required'],
            'category' => ['required', 'integer'],
            'translation' => ['required']
        ]);

        $category = Category::find($request->category);
        $folderName = 'media/' . $category->name;

        $fileName = time() . '_' . $request->media->getClientOriginalName();
        $filePath = $request->media->storeAs($folderName, $fileName);

        $crime = new Crime();
        $crime->text = $request->text;
        $crime->media = $filePath;
        $crime->category_id = $request->category;
        $crime->translation = $request->translation;
        $crime->save();
        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('crimeDetails');
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
