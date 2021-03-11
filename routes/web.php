<?php

$route = new \Utils\Routing\Route(request());

/*$route->add('/as', function () {
    echo '<h1>Hello Pokedex!</h1><br>';
    //$template = new Utils\View\View();
    //$template->render('pokedex.html');
    //view('pokedex.html', [
     //   'pokemonName' => 'Balbusaur',
       // 'appEnv' => env_var('APP_ENV'),
    //]);
});*/

$route->add('/', 'PokemonController@index');
$route->add('/show', 'PokemonController@show');
$route->add('/pokemon/:id', 'PokedexController@index');
