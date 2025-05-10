<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public function index(Request $request) {
        $invoices = Invoice::all();
        return response()->json($invoices);
    }
    public function postInvoice(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string',
            'valor' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
        ]);

        
        $invoice = Invoice::create([
            'description' => $request->description,
            'valor' => $request->valor,
            'user_id' => $request->user_id,
            'address_id' => $request->address_id,
        ]);

        return response()->json([
            'description' => $invoice->description,
            'valor' => $invoice->valor,
            'user_id' => $invoice->user_id,
            'address_id' => $invoice->address_id
        ]);
    }

    public function findOne (Request $request) {
        $invoice = Invoice::find($request->id);
        $invoice['user'] = $invoice->user;
        $invoice['address'] = $invoice->address;
        return $invoice;
    }
}
