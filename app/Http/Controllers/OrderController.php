<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FedaPay\FedaPay;
use Illuminate\Routing\Controllers\Middleware;
use FedaPay\Transaction;
use App\Models\Order;

class OrderController extends Controller
{
     public static function middleware(): array
    {
        return [
            new Middleware('permission:order.view', only: ['index']),
            new Middleware('permission:staff.update', only: ['delivery_confirm','reject','delivery_start']),


        ];
    }

    //
    public function __construct (){
       FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
       FedaPay::setEnvironment(env('FEDAPAY_ENVIRONMENT'));
    }
     public function checkoutPage(Request $request){
        //paie
        //suprimer la session
        //enregistrer la comende dans une session

        $transaction = Transaction::create([
            'description' => 'Payment de la commande id_commande',
            'amount' => 1000,
            'currency' => ['iso' => 'XOF'],
            'callback_url' =>route('order.callback'),
            'mode' => 'mtn_open',
            'customer' => ["firstname" => "John",
                        "lastname" => "Doe",
                        "email" => "John.doe@gmail.com",
                        "phone_number" => [
                                        "number" => "66000001",
                                        "country" => 'bj' // 'bj' Benin code
                                    ]
                    ]
            ]);
        return redirect($transaction->payment_url);
    }
     public function callback(Request $request){
        //enregistrer la commande si le payement est passer
        //sino

        $transactionId = $request -> input ( 'id ') ;
        $statut = $request -> input (" status ") ;
        if($transactionId){
            switch($statut){
                case 'approved':
                    //confirmer le payement he fedapay
                    //enregistre la comende
                    //retourner l'acceuil
                    return to_route('home');
                    break;
                default:
                  dump('payement aprouver');
                  break;
            }


        }
        return to_route('home');
        // dd("callbak action");
    }
   public function createTransaction ( $data ){

   }

    public function index()
    {
        $all = Order::all();

        return view('orders.index', compact('all'));
    }

    public function delivery_confirm(Order $order)
    {
        $order->update([
            'delivery_status' => 'DELIVRED',
        ]);

        return redirect()->route('admin.order.index');

    }

    public function delivery_start(Order $order)
    {
        $order->update(
            [
                'delivery_status' => 'START',
            ]);

        return redirect()->route('admin.order.index');
    }

    public function reject(Order $order)
    {
        $order->update(
            [
                'delivery_status' => 'REJECT',
            ]);

        return redirect()->route('admin.order.index');

    }

}
