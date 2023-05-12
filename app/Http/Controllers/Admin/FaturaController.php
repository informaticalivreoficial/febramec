<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use WebMaster\PagHiper\PagHiper;
use Illuminate\Http\Request;

class FaturaController extends Controller
{
    public function index($pedido)
    {
        //
    }

    public function gerarBoleto()
    {
        $paghiper = new PagHiper(
            env('PAGHIPER_APIKEY'), 
            env('PAGHIPER_TOKEM')
        );
        $transaction = $paghiper->billet()->create([
            'order_id' => 'ABC-456-789',
            'payer_name' => 'Pedro Lima',
            'payer_email' => 'comprador@email.com',
            'payer_cpf_cnpj' => '1234567891011',
            'type_bank_slip' => 'boletoa4',
            'days_due_date' => '3',
            'items' => [[
                'description' => 'Macbook',
                'quantity' => 1,
                'item_id' => 'e24fc781-f543-4591-a51c-dde972e8e0af',
                'price_cents' => '1000'
            ]]
        ]);
    }

    public function cancelaBoleto()
    {
        $paghiper = new PagHiper(
            env('PAGHIPER_APIKEY'), 
            env('PAGHIPER_TOKEM')
        );
        $transaction = $paghiper->billet()->cancel('03UTF9C1LRZAPM23');
    }
}
