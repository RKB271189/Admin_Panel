<template>
  <v-app>
    <Header></Header>
    <Menu :page-name="pageName"></Menu>
    <v-main>
      <v-container class="fluid">
        <v-row no-gutters>
          <v-col v-for="n in 3" :key="n" cols="12" sm="4">
            <v-sheet class="ma-2 pa-2"> One of three columns </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Header from "./Layout/Header.vue";
import Menu from "./Layout/Menu.vue";
export default {
  data() {
    return {
      loading: false,
      pageName: "Picture Gallery",
    };
  },
  components: {
    Header,
    Menu,
  },
};
</script>

<style>
</style>