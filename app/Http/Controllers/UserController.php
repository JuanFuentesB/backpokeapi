<?php

namespace App\Http\Controllers;

use App\Models\pokemon;
use App\Models\users;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $list = DB::table('pokemon')
        ->join("users","users.ID", "=", "pokemon.user_id")
        ->select(DB::raw('GROUP_CONCAT(number_pokede) as pokemons, user_id'))
        ->groupBy('pokemon.user_id')
        ->get();

        $pokemon = [];
        
        foreach($list as $c){
            $c->user_id;

            $separador = ",";
            $separada = explode($separador, $c->pokemons);

            $nombre = DB::table('users')
            ->select('name')
            ->where('ID', '=', $c->user_id)
            ->get();

            $object = (object) [
                'user_id' => $c->user_id,
                'name' => $nombre[0]->name,
                'pokemons' => $separada,
            ];

            array_push($pokemon, $object);
        }
        return response()->json($pokemon);
    }

    public function store(Request $request)
    {
        $users = new users;
        $users->Name = $request->name;
        $users->save();

        foreach ($request->number_pokemon as $number) {
             
            $pokemons = new pokemon;
            $pokemons->number_pokede = $number;
            $pokemons->user_id = $users->max('ID');;
            $pokemons->save();
        }

        return "exito";
    }
}
