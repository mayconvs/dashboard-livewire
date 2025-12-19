<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function invoice_download($id) {
        /* $invoices = auth()->user()->invoices();
        $data['invoices'] = $invoices;

        if(count($invoices) > 0) {
            $invoices = auth()->user()->invoices()->first();
        } */
        return auth()->user()->downloadInvoice($id, [
            'vendor' => env('APP_NAME'),
            //'product' => 'Your Product',
            //'street' => 'Main Str. 1',
            //'location' => '2000 Antwerp, Belgium',
            'phone' => env('PHONE_ADMIN'),
            'email' => env('MAIL_ADMIN'),
            'url' => env('URL_SITE'),
            //'vendorVat' => 'BE123456789',
        ]);
    }
}
