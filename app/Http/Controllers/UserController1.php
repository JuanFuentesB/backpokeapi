<?php

namespace App\Http\Controllers;

use App\Models\pokemon;
use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(Request $request){

        dd("aqui si entra");
        /*$user = new user;
        $user->name = $request->name;
        $user->save();
        
        hacer foreach para guardar los pokemon
        $pokemon = new pokemon;
        $pokemon->number_pokede = $request->name;
        $pokemon->user_id = $request->name;
        $pokemon->save();*/
    }

    public function listUser(){
        $pokemons = pokemon::All();

        return $pokemons;
        /*if($pokemons->isEmpty()){
            return response()->json([
                'status' => '400',
                'data' => 'Not Found'
            ]);
        }else{
            return response()->json([
                'status' => '200',
                'data' => $pokemons
            ]);
        }*/
    }
}
