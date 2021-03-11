<?php

namespace App\Commands;

use App\Models\Pokemon;

class DbSeedCommand
{
    public function run()
    {
        echo "************** Cargando Pokedex **************\n";
        $apiUrl = "https://pokeapi.co/api/v2/pokemon?limit=151&offset=0";
        $pokemonArray = [];

        echo "Consultando: {$apiUrl}\n";
        $apiConnection = \curl_init($apiUrl);
        \curl_setopt($apiConnection, CURLOPT_RETURNTRANSFER, true);
        $apiResponse = json_decode(curl_exec($apiConnection), true);
        \curl_close($apiConnection);

        echo "Agregando Pokemons a la Memoria Temporal";
        foreach ($apiResponse['results'] as $response) {
            $timeStatus = '.';

            echo $timeStatus;
            /**
             * Datos Principales
             */
            $pokemonApiConnection = \curl_init($response['url']);
            \curl_setopt($pokemonApiConnection, CURLOPT_RETURNTRANSFER, true);
            $pokemonData = json_decode(curl_exec($pokemonApiConnection), true);
            \curl_close($pokemonApiConnection);
            /**
             * Descripciones
             */
            $pokemonApiConnectionSpecies = \curl_init($pokemonData['species']['url']);
            \curl_setopt($pokemonApiConnectionSpecies, CURLOPT_RETURNTRANSFER, true);
            $pokemonDataDescript = json_decode(curl_exec($pokemonApiConnectionSpecies), true);
            \curl_close($pokemonApiConnectionSpecies);
            /**
             * Habilidades Descripción
             */
            $pokemonApiConnectionAbility= \curl_init($pokemonData['abilities'][0]['ability']['url']);
            \curl_setopt($pokemonApiConnectionAbility, CURLOPT_RETURNTRANSFER, true);
            $pokemonDataAbilityDescrip = json_decode(curl_exec($pokemonApiConnectionAbility), true);
            \curl_close($pokemonApiConnectionAbility);
            /**
             * Agregamos la Información
             */
            array_push($pokemonArray, [
                'code' => str_pad((string)$pokemonData['id'], 3, "0", STR_PAD_LEFT),
                'name' => ucwords($pokemonData['name']),
                'description' => ucwords($pokemonDataDescript['flavor_text_entries'][26]['flavor_text']) ?? 'Sin Info',
                'image' => $pokemonData['sprites']['other']['official-artwork']['front_default'],
                'image_shiny' => $pokemonData['sprites']['front_shiny']?? 'Sin Info',
                'height' => (string)$pokemonData['height'],
                'weight' => (string)$pokemonData['weight'],
                'ability' => ucwords($pokemonData['abilities'][0]['ability']['name']),
                'ability_description' => ucwords($pokemonDataAbilityDescrip['flavor_text_entries'][13]['flavor_text']) ?? 'Sin Info',
            ]);
        }

        echo "\nInsertando Pokemons en la Pokedex :).\n";
        Pokemon::insert($pokemonArray);
        echo "¡Pokemons Insertados con Éxito! ;)\n";
    }
}