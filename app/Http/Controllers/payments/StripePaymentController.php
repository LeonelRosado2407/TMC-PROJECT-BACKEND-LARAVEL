<?php

namespace App\Http\Controllers\payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\ApiOperations\Create;
use Stripe\Http\Cur\Client;
use Stripe\ApiRequestor;
use App\Models\skins;
use App\Models\skinUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Pagos\StripeProcessor;

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
        $datos = $request->all();

        $skin = skins::where('id',$request->input('idskin'))->first();

        $user = Auth::user();

        



        		//aqui se procesa el pago
		$stripe=new StripeProcessor();
		$objeto_pago=new \StdClass();
		$objeto_pago->amount=$skin['precio'] * 100;
		//dd($objeto_pago->amount);
		$objeto_pago->currency_code='MXN';
		$objeto_pago->producto=$skin['nombre'];
		$objeto_pago->email=$user['email'];
		$objeto_pago->token=$request->input('stripetoken');
		$objeto_pago->item_number=$skin['id'];

		$stripeResponse= $stripe->enviar_datos_pago($objeto_pago);
		//dd($stripeResponse);
		//Poner todos los processos de post venta 
		if($stripeResponse->status=='OK'){

			//dd($stripeResponse->status);
            $skinUser = new skinUser();
            $skinUser -> skin_id = $skin['id'];
            $skinUser -> user_id = $user['id'];
            $skinUser ->save();



			return [$stripeResponse->status];
			// $bowardrobe=new BoWardrobe();
			// $objeto_status=new \StdClass();
			// $objeto_status->idskins=$skins->idskins;
			// $res_status=$bowardrobe->nueva_skin($objeto_status);


            


		}
		//dd($datos);
		//return response()->json($stripeResponse);
		


        


    
        return [$datos, $skin, $user['email'], $request->input('stripetoken'), $skin['id'], $skin['precio'] * 100];
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
