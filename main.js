//const pokemons = [{nombre: "JPR", puesto:"presi"},
//                  {nombre: "JPC", puesto:"tesorero"},
//                  {nombre: "ARIEL", puesto: "secretario"},
//                 ]// ACA DEBO TRAER EL JSON DE LA API QUE TENEMOS EN EL MODELO

const form = document.querySelector("#search-form");
const button = document.querySelector("#search-btn");
const result = document.querySelector("#result");
const filter = () => {
  result.innerHTML = "";
  const txt = form.value.toLowerCase();
  for (let poke of pokemons) {
    let pokeName = poke.nombre.toLowerCase();
    if (pokeName.indexOf(txt) !== -1) {
      result.innerHTML +=
        "<h2>Pokémon Information</h2>" +
        "<p class = 'pokeinfoname'>" +
        "<?=" +
        $searchedPokemon +
        "?></p>" +
        "<p class='pokeinfotype'><strong>Type : </strong>" +
        "<?=" +
        pokemonType($searchedPokemon, 3, 1) +
        "?><br/></p>" +
        "<p class='pokeinfoabilities'><strong>Abilities : </strong>" +
        "<?=" +
        pokemonAbilities($searchedPokemon, 4, 1) +
        "?></p>" +
        "<img class='infosprite' src=" +
        "<?=" +
        pokemonSprite($searchedPokemon, 2, 0) +
        "?>" +
        "<img class='infosprite2' src=<?=" +
        pokemonSpriteShiny($searchedPokemon, 3, 0) +
        "?>" +
        "<p class = 'close-button2'>Close information</p>" +
        "<p class = 'pokeinfodescription'><strong>Description : </strong>" +
        "<?=" +
        pokemonDescription($searchedPokemon, 4, 1) +
        "?></p>" +
        "<p class='pokeheight'><strong>Height : </strong>" +
        "<?=" +
        pokemonHeight($searchedPokemon, 4, 1) +
        "?>0cm <br/></p>" +
        "<p class='pokeweight'><strong>Weight : </strong>" +
        "<?=" +
        pokemonWeight($searchedPokemon, 4, 1) +
        "?>Kg</p>" +
        "<p class = 'shinyform'>Shiny <?=" +
        $searchedPokemon +
        "?></p>";
    }
  }
  if (result.innerHTML === "") {
    result.innerHTML += "<h3>NOT FOUND :(</h3>";
  }
};

button.addEventListener("click", filter);
form.addEventListener("keyup", filter);

filter();
