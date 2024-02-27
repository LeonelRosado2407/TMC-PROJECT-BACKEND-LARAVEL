<?php

namespace App\Http\Controllers;

use App\Models\skins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SkinsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skins = skins::where('estatus', 1)->get();
        foreach ($skins as $skin) {
            // Recuperar la imagen del storage
            if ($skin->imagen != null) {
                $path = $skin->imagen;
                $extension = explode('.', $path);
                $imageData = Storage::disk('public')->get($path);
                $base64Image = base64_encode($imageData);
                $base64Image = 'data:image/' . $extension[1] . ';base64,' . $base64Image;
                // Asignar la imagen codificada al objeto skin
                $skin->imagen = $base64Image;
            }else{
                $path = public_path('black\img\default.png');
                $extension = explode('.', $path);
                $imageData = File::get($path);
                $base64Image = base64_encode($imageData);
                $base64Image = 'data:image/' . $extension[1] . ';base64,' . $base64Image;
                // Asignar la imagen codificada al objeto skin
                $skin->imagen = $base64Image;
            }
            
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
        
        $imageName = uniqid() . '.' . $request->imgUpload->getClientOriginalExtension();
        $request->imgUpload->storeAs('images/skins', $imageName, 'public');

        // Create a new Skins instance and save the image path
        $skins = new Skins();
        $skins->nombre = $request->name;
        $skins->precio = $request->price;
        $skins->estatus = $request->status;
        $skins->imagen = "images/skins/".$imageName;
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
