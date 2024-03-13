<?php

namespace App\Pagos;
require_once 'Stripe/init.php';

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\ApiOperations\Create;
use Stripe\Charge;
use Stripe\HttpClient\CurlClient;
use Stripe\ApiRequestor;

//use App\BusinessLogic\BoLogCheckout;

class StripeProcessor
{
    var $objeto_stripe;
    

    function __construct()
    {

        $curl = new CurlClient([CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2]);
        ApiRequestor::setHttpClient($curl);
        $this->objeto_stripe=new Stripe();
        $this->objeto_stripe->setVerifySslCerts(false);
        $this->objeto_stripe->setApiKey(env('STRIPE_SECRET'));
    }

    function crear_customer($objeto)
    {
        //dd($objeto->token);
        $customer = new Customer();
        $datos_customer=array();
        $datos_customer['email']=$objeto->email;
        $datos_customer['source']=$objeto->token;
        //dd($datos_customer);
        $customerDetails = $customer->create($datos_customer);
        //dd($datos_customer);
        return $customerDetails;
    }

    function enviar_datos_pago($objeto)
    {
        //return[$objeto];
        $customerResult = $this->crear_customer($objeto);
        //dd($customerResult);
        $cargo = new Charge();
        $cardDetailsAry = array(
            'customer'=>$customerResult->id,
            'amount'=>$objeto->amount,
            'currency'=>$objeto->currency_code,
            'description'=> $objeto->producto,
            'metadata' => array(
                'orden_id' => $objeto->item_number
            )

            );
            //conectamos al stripe
            $result = $cargo->create($cardDetailsAry);
            $obj_result=$result->jsonSerialize();

            //post venta 
            $resultado=new \StdClass();
            if( ($obj_result['amount_refunded'] == 0) && (empty($obj_result['failure_code'])) && ($obj_result['paid']) && 
            ($obj_result['captured']) && ($obj_result['status'] == 'succeeded')){
                $resultado->status='OK';
                $resultado->transaccion=$obj_result;
            }
            else{
                $resultado->status='Error';
                $resultado->transaccion=null;
                
            }
            //dd($resultado);

            // $bo=new BoLogCheckout();
            // $objeto_log=new \StdClass();
            // $objeto_log->idskins=$objeto->item_number;
            // $objeto_log->json=json_encode($obj_result);
            // $bo->registrar($objeto_log);


            return $resultado;

    }

      





}

