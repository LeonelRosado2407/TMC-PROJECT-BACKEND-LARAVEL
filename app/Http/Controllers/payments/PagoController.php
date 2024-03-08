<?php

namespace App\Http\Controllers;
use App\Models\skins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class PagoController extends Controller
{
    function index() {

        $skins = skins::all();
        
        foreach ($skins as $skin) {
            $skin-> imagen = $this->getImage($skin->id);
        }
       // dd($skins);

        return view('pages.shop.index',["skins"=>$skins] ); 
    }

    public function getImage($id){
        $skins = skins::where('id',$id)->first();
        if ($skins != null) {
            if ($skins-> imagen != null) {
                $path = $skins-> imagen;
                $extension = explode('.', $path);
                $imageData = Storage::disk('public')->get($path);

                if ($imageData == null) {
                    $path = public_path('black/img/default.png');
                    $extension = "png";
                    $imageData = File::get($path);
                }
                
                $base64Image = base64_encode($imageData);
                $base64Image = 'data:image/' . $extension[1] . ';base64,' . $base64Image;
                // Asignar la imagen codificada al objeto skins$skins
                $imagenUrl= $base64Image;
        
            }else{
                $path = public_path('black\img\default.png');
                $extension = explode('.', $path);
                $imageData = File::get($path);
                $base64Image = base64_encode($imageData);
                $base64Image = 'data:image/' . $extension[1] . ';base64,' . $base64Image;
                // Asignar la imagen codificada al objeto producto
                $imagenUrl = $base64Image;
            }
        }

        return $imagenUrl;
    }

}
