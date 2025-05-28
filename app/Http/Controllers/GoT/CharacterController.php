<?php

namespace App\Http\Controllers\GoT;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CharacterController extends Controller
{
    public function index()
    {
        $response   = Http::get('https://api.gameofthronesquotes.xyz/v1/characters');
        $characters = $response->json();
        return view('got.characters.index', compact('characters'));
    }

    public function show(string $slug)
    {
        $response = Http::get("https://api.gameofthronesquotes.xyz/v1/character/{$slug}");
        $data     = $response->json();

        if (empty($data)) {
            abort(404, "Personaje '{$slug}' no encontrado.");
        }

        // Extraemos el primer elemento
        $character = $data[0];

        return view('got.characters.show', compact('character'));
    }
}
