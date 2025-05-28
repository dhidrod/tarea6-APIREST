<?php

namespace App\Http\Controllers\GoT;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HouseController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.gameofthronesquotes.xyz/v1/houses');
        $houses = $response->json();
        return view('got.houses.index', compact('houses'));
    }

    public function show(string $slug)
    {
        $response = Http::get("https://api.gameofthronesquotes.xyz/v1/house/{$slug}");
        $data = $response->json();

        if (empty($data)) {
            abort(404, "Casa “{$slug}” no encontrada.");
        }

        $house = $data[0];

        // Para cada miembro, obtenemos sus frases
        $membersWithQuotes = collect($house['members'])->map(function($member) {
            $resp = Http::get("https://api.gameofthronesquotes.xyz/v1/character/{$member['slug']}");
            $chData = $resp->json();
            $character = $chData[0] ?? null;

            return [
                'name'   => $member['name'],
                'slug'   => $member['slug'],
                'quotes' => $character['quotes'] ?? [],
            ];
        })->toArray();

        // Sustituimos la lista de miembros
        $house['members'] = $membersWithQuotes;

        return view('got.houses.show', compact('house'));
    }


}
