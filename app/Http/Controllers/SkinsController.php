<?php

namespace App\Http\Controllers;

use App\Models\skins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkinsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skins = skins::where('estatus', 1)->get();
        foreach ($skins as $key => $value) {
            $image = Storage::url($value->imagen);
            $value->imagen = $image;
        }
        // dd($skins);
        return view('pages.skins.index',[
            'skins' => $skins

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.skins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:150',
            'price' => 'required|max:10',
            'status' => 'required',
            'imgUpload' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $imageName = $request->imgUpload->getClientOriginalName();
        // dd($imageName);
        $request->imgUpload->storeAs('images', $imageName, 'public');

        // Create a new Skins instance and save the image path
        $skins = new Skins();
        $skins->nombre = $request->name;
        $skins->precio = $request->price;
        $skins->estatus = $request->status;
        $skins->imagen = "images/skins/".$imageName;
        $skins->save();

        return redirect()->route('skins.index')->with('success', 'Skin created successfully.');
        

        $skins = new Skins();
        $skins->nombre = $request->name;
        $skins->precio = $request->price;
        $skins->estatus = $request->status;
        $skins->save();
        return redirect()->route('skins.index')->with('success', 'Skin created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(skins $skins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(skins $skins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, skins $skins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(skins $skins)
    {
        //
    }
}
