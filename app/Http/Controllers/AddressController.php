<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request) {
        $addresses = Address::all();
        return response()->json($addresses);
    }

    public function findOne(Request $request) {
        if (!is_numeric($request->id)) {
            return response()->json(['mensagem' => 'ID inválido.'],400);
        }

        $address = Address::find($request->id);

        if (!$address) {
            return response()->json(['mensagem'=> 'Endereço não encontrado.'],404);
        }
        
        $address['user'] = $address->user;
        return response()->json($address);
    }

    public function postAddress(Request $request) {
        $address = Address::create([
            'address' => $request->address]);

        return response()->json([
            'id' => $address->id,
            'address' => $address->address
        ], 201);
    }
}
