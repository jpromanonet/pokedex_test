<?php
    include('url.php');
    include('getInfo.php');
    include('footer.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pokédex</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css">
    <link rel="icon" type="image/png" href="fav-ic/pokeball.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="fav-ic/pokeball.png" />
</head>
<body>
<?php include('header.php'); ?>
    <form class="formSearch"action="" method="get">
        <input id="search-form" class ="input" type="text" name="pokemon" placeholder="Search any Pokemon">
        <input id="search-btn" class ="submitfirst" value="" type="submit">
    </form>
    <div id="result">
    
    <div>
    <div class="list-pokemon">

        <!-- Pokémon display 151 pokémon ----------------------------------------------- -->
        <?php foreach($pokemon as $_pokemon): ?>
            <div class="list-item-pokemon">
                <p class="pokeid"><?= pokemonId($_pokemon->name, 1)?>.</p>
                <div class="sprites-container">
                    <img class="sprite" src="<?= pokemonSprite($_pokemon->name, 2, 0)?>">
                </div>
                <p class ="pokename" id="p-name"><?= $_pokemon->name ?></p>
                <p class="poketype">Type: <?= pokemonType($_pokemon->name, 3, 1)?></p>
            </div>

            <!-- Pokémon Pannel on click ----------------------------------------------- -->
            <div class="pokeinfo">
                <h2>Pokémon Information</h2> 
                <p class = "pokeinfoname"><?= $_pokemon->name ?></p>
                <p class="pokeinfotype"><strong>Type : </strong><?= pokemonType($_pokemon->name, 3, 1)?><br/></p>            
                <p class="pokeinfoabilities"><strong>Abilities : </strong><?= pokemonAbilities($_pokemon->name, 4, 1)?></p>
                <img class="infosprite" src="<?= pokemonSprite($_pokemon->name, 2, 0)?>">
                <img class="infosprite2" src="<?= pokemonSpriteShiny($_pokemon->name, 3, 0)?>">
                <p class = "close-button">Close information</p>
                <p class = "pokeinfodescription"><strong>Description : </strong><?= pokemonDescription($_pokemon->name, 4, 1)?></p>
                <p class="pokeheight"><strong>Height : </strong><?= pokemonHeight($_pokemon->name, 4, 1)?>0cm <br/></p>
                <p class="pokeweight"><strong>Weight : </strong><?= pokemonWeight($_pokemon->name, 4, 1)?>Kg</p>
                <p class = "shinyform">Shiny <?= $_pokemon->name ?></p>
            </div>
        <?php endforeach; ?>

        <!-- Pokémon Pannel Search ----------------------------------------------- -->
        <?php if(!empty($_GET['pokemon'])): ?>
            <div class="pokeinfo pokesearch" style ="display : flex">
                <h2>Pokémon Information</h2> 
                    <p class = "pokeinfoname"><?= $searchedPokemon ?></p>
                    <p class="pokeinfotype"><strong>Type : </strong><?= pokemonType($searchedPokemon, 3, 1)?><br/></p>            
                    <p class="pokeinfoabilities"><strong>Abilities : </strong><?= pokemonAbilities($searchedPokemon, 4, 1)?></p>
                    <img class="infosprite" src="<?= pokemonSprite($searchedPokemon, 2, 0)?>">
                    <img class="infosprite2" src="<?= pokemonSpriteShiny($searchedPokemon, 3, 0)?>">
                    <p class = "close-button2">Close information</p>
                    <p class = "pokeinfodescription"><strong>Description : </strong><?= pokemonDescription($searchedPokemon, 4, 1)?></p>
                    <p class="pokeheight"><strong>Height : </strong><?= pokemonHeight($searchedPokemon, 4, 1)?>0cm <br/></p>
                    <p class="pokeweight"><strong>Weight : </strong><?= pokemonWeight($searchedPokemon, 4, 1)?>Kg</p>
                    <p class = "shinyform">Shiny <?= $searchedPokemon ?></p>

                    <!-- Close the $searchedPokemon Pannel ----------------------------------------------- -->
                    <script>
                    const closeButton2 = document.querySelector('.close-button2')
                    const infopannel2 = document.querySelector(".pokesearch")

                         closeButton2.addEventListener(
                            'click', () =>
                            {
                                infopannel2.style.display = 'none'
                        })
                    </script>   

            </div>
        <?php endif;?>
    </div>
    <script src="main.js"></script>
</body>
<?php include('footer.php');?>

</html>