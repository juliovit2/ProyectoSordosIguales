<?php

namespace App\Http\Controllers;

use App\Donaciones;
use Illuminate\Http\Request;
use Transbank\Webpay\Configuration;
use Transbank\Webpay\Webpay;

class DonacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donaciones = Donaciones::OrderBy('id')->get();
        return view('Donaciones/index',['donaciones'=>$donaciones]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Donaciones/donar');//
    }

    public function Webpay(Request $request){

        $donaciones = Donaciones::create($request->all());

        //Instalar el SDK con " composer require transbank/transbank-sdk" en consola
        //
        require_once 'C:/laragon/www/ProyectoSordosIguales/vendor/autoload.php';

        $transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))
            ->getNormalTransaction();
        $donaciones->name_donacion;
        $amount = $donaciones->monto_donacion;
        // Identificador que será retornado en el callback de resultado:
        $sessionId = "mi-id-de-sesion";
        // Identificador único de orden de compra:
        $buyOrder = strval(rand(100000, 999999999));
        $returnUrl = "http://proyectosordosiguales.test/return.php";
        $finalUrl = "https://callback/final/post/comprobante/webpay";
        $initResult = $transaction->initTransaction(
            $amount, $buyOrder, $sessionId, $returnUrl, $finalUrl);

        $formAction = $initResult->url;
        $tokenWs = $initResult->token;



        return view('Donaciones/webpay',compact("amount","buyOrder","formAction","tokenWs"));//
    }

    public function Retorno(Request $request){

        require_once 'C:/laragon/www/ProyectoSordosIguales/vendor/autoload.php';

        $result = $request->getTransactionResult($request->input("token_ws"));
        $output = $result->detailOutput;

        if ($output->responseCode == 0) {
            // Transaccion exitosa, puedes procesar el resultado con el contenido de
            // las variables result y output.
            echo '<script>window.localStorage.clear();</script>';
            echo '<script>window.localStorage.setItem("authorizationCode",'. $output->authorizationCode .')</script>';
            echo '<script>window.localStorage.setItem("amount",'. $output->amount .')</script>';
            echo '<script>window.localStorage.setItem("responseCode",'. $output->responseCode .')</script>';
        }
        return view("Donaciones.Retorno");
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request);
        $data = request()->all();
        $this->validate(request(),[
            'name_donante' => 'string',
            'monto_donacion' => 'required',
        ]);
        if(Arr::exists($data, 'name_donante')){
            Donaciones::create([
                'name_donante' => $data['name_donante'],
                'monto_donacion' => $data{'monto_donacion'},
            ]);
        }else{
            Donaciones::create([
                'name_donante' => 'Anonimo',
                'monto_donacion' => $data{'monto_donacion'},
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donaciones  $donaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Donaciones $donaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donaciones  $donaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Donaciones $donaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donaciones  $donaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donaciones $donaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donaciones  $donaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donaciones $donaciones)
    {
        //
    }

}
