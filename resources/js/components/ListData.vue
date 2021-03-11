<template>
  <div class="row">
    <template v-for="pokemon in searchPokemon">
      <div class="col-sm" :key="pokemon.id">
        <div class="card border-danger" style="width: 18rem;" >
          <img class="card-img-top img-thumbnail" :src="pokemon.image" :alt="pokemon.name" />
          <div class="card-body">
            <h4 class="card-title">{{ pokemon.code }} - {{ pokemon.name }}</h4>
            <p class="card-text">
              <b>Detalle: </b> {{ pokemon.description }} <br />
              <b>Altura: </b> {{ pokemon.height }} <br />
              <b>Peso: </b> {{ pokemon.weight }} <br />
              <b>Habilidad: </b> {{ pokemon.ability }}<br />
              <b>Habilidad Detalle: </b> {{ pokemon.ability_description }}<br />
            </p>
            <a
              :href="moreInfoUrl(pokemon)"
              target="_blank"
              class="btn btn-danger"
              :title="pokemon.name"
              ><i class="fas fa-info-circle" aria-hidden="true"></i> Más Info</a
            >
          </div>
        </div>
      </div>
    </template>
  </div>
</template>
<script>
import EventBus from "../bus";
export default {
  name: "ListData",
  mounted() {
    this.getData();
    this.eventSearch();
  },
  data() {
    return {
      dataList: [],
      queryPokemon: "",
    };
  },
  methods: {
    async getData() {
      let dataResponse = await fetch("/show");
      this.dataList = await dataResponse.json();
    },
    moreInfoUrl(item) {
      return "https://www.pokemon.com/el/pokedex/" + item.name.toLowerCase();
    },
    eventSearch() {
      EventBus.$on("search-pokemon", (queryPokemon) => {
        this.queryPokemon = queryPokemon;
      });
    },
  },
  computed: {
    searchPokemon() {
      return this.dataList.filter((item) =>
        item.name.toLowerCase().startsWith(this.queryPokemon.toLowerCase())
      );
    },
  },
};
</script>
<style>
</style>