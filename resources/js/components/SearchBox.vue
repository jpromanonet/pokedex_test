<template>
  <div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
      <form class="card card-sm">
        <div class="card-body row no-gutters align-items-center">
          <!--end of col-->
          <div class="col">
            <input
              name="query"
              class="form-control form-control-lg form-control-borderless"
              type="search"
              placeholder="Busca tu Pokemon"
              v-model="query"
              v-on:keyup="search"
            />
          </div>
          <!--end of col-->
          <!--end of col-->
        </div>
      </form>
    </div>
    <!--end of col-->
  </div>
</template>

<script>
import EventBus from "../bus";

export default {
  name: "SearchBox",
  data() {
    return {
      query: "",
    };
  },
  methods: {
    search() {
      EventBus.$emit("search-pokemon", this.query);
    },
  },
};
</script>