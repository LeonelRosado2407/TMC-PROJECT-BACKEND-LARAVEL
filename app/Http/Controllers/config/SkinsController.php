<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use App\Models\skins;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\String_;

class SkinsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skins = skins::where('estatus', 1)
            ->orWhere('estatus', 0)
            ->paginate($perPage = 10, $columns = ['*'], $pageName = 'page');
        
        foreach ($skins as $skin) {
            // Recuperar la imagen del storage
            $skinWithImage = $this->getImage($skin->id);
            $skin->imagen = $skinWithImage->imagen;
            
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
        $skin = new skins();
        return view('pages.skins.create', [
            'skin' => $skin
        ]);
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
        

        // Create a new Skins instance and save the image path
        $skins = new Skins();
        $skins->nombre = $request->name;
        $skins->precio = $request->price;
        $skins->estatus = $request->status;

        if ($request->has('imgUpload')) {
            $imageName = uniqid() . '.' . $request->imgUpload->getClientOriginalExtension();
            $request->imgUpload->storeAs('images/skins', $imageName, 'public');
            $skins->imagen = "images/skins/".$imageName;

        }

        $create = $skins->save();
        if ($create) {
            $status = true;
            $message = 'Skin Creada Correctamente';
        }else{
            $status = false;
            $message = 'Error al crear la skin';
        }

        return redirect()->route('skins.index')->with('status', $status)->with('message', $message);
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
    public function edit(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $skin = $this->getImage($id);  

            return view('pages.skins.edit', [
                'skin' => $skin
            ]);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            return redirect()->route('skins.index')->with('error', 'Invalid skin ID');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $skinId)
    {
        try {
            $request->validate([
                'name' => 'required|max:150',
                'price' => 'required|max:10',
                'status' => 'required',
                'imgUpload' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            
            $skinId = Crypt::decrypt($skinId);
            $skin = skins::findorFail($skinId);

            // Create a new Skins instance and save the image path
            $skin->nombre = $request->name;
            $skin->precio = $request->price;
            $skin->estatus = $request->status;

            if ($request->has('imgUpload')) {
                $imageName = uniqid() . '.' . $request->imgUpload->getClientOriginalExtension();
                if ($skin->imagen && Storage::exists($skin->imagen)) {
                    Storage::delete($skin->imagen);
                }
    
                $request->imgUpload->storeAs('images/skins', $imageName, 'public');
                $skin->imagen = "images/skins/".$imageName;

            }

            $edited = $skin->save();
            if ($edited) {
                $status = true;
                $message = 'Skin Actualizada Correctamente';
            }else{
                $status = false;
                $message = 'Error al actualizar la skin';
            }

        return redirect()->route('skins.index')->with('status', $status)->with('message', $message);

        } catch (Exception $exception) {
            dd($exception->getMessage());
            return redirect()->route('skins.index')->with('error', 'Invalid skin ID');
        }
    
    


        // Eliminar la imagen anterior del almacenamiento si existe


        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
            $skin = skins::findorFail($id);
            $skin->estatus = 0;
            $deleted = $skin->save();
            if ($deleted) {
                $status = true;
                $message = 'Skin Eliminada Correctamente';
            }else{
                $status = false;
                $message = 'Error al eliminar la skin';
            }

            return redirect()->route('skins.index')->with('status', $status)->with('message', $message);
        } catch (Exception $exception) {
            dd($exception->getMessage());
            return redirect()->route('skins.index')->with('error', 'Invalid skin ID');
        }
    }

    function getImage($skinId) : skins{

        $skin = skins::findorFail($skinId);
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

        return $skin;
    }
}
