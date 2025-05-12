<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function index(Request $request) {
        $users = User::all();
        return $users;
    }

    public function findOne(Request $request) {
        if (!is_numeric($request->id)) {
            return response()->json(["messagem"=> "ID inválido"],400);
        }

        $user = User::find($request->id);

        if (!$user) {
            return response()->json(["mensagem"=> "Usuário não encontrado."],404);
        }
        $user['addresses'] = $user->addresses;
        return response()->json($user);
    }

    public function postUser(Request $request) {
        if (!preg_match("/^[\p{L}\s]+$/u", $request->name)) {
            return response()->json(["mensagem"=> "Nome inválido."],400);
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(["mensagem"=> "Email inválido"],400);
        }

        if (strlen($request->password) < 6) {
            return response()->json(["mensagem"=> "Senha deve ter no mínimo 6 caracteres."], 400);
        }

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'id'=> $user->id,
            'name'=> $user->name,
            'email'=> $user->email
        ], 201);
    }
}
