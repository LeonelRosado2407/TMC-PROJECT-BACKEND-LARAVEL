<?php

namespace App\Http\Controllers\payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\skins;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{
    public function index(Request $request)
    {
        $skins = skins::where('id',$request->query('id'))->first();
        $skins->imagen = $this->getImage($skins->id);
    
        $user = Auth::user();

        

        return view('pages.payment.stripe.payment', ["skins"=>$skins], ["user"=>$user]);
    }

    public function makePayment(Request $request)
    {
        //set stripe secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => 100,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Test payment from itsolutionstuff.com.'
            ]);
            return view('pages.payment.stripe.payments-success');
        } catch (\Exception $ex) {
            return $ex->getMessage(); // Manejo de errores, puedes redirigir a una página de error.
        }
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
