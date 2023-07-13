<template>
  <v-app>
    <Header></Header>
    <Menu :page-name="pageName"></Menu>
    <v-main>
      <v-container class="fluid">
        <v-card class="bg-opacity-blue">
          <v-row>
            <v-col v-for="images in picture" :key="images.id" cols="12" sm="4">
              <v-sheet class="ma-2 pa-2">
                <v-img
                  :src="images.profile_pic"
                  max-height="125"
                  cover
                  class="bg-grey-lighten-2"
                ></v-img>
              </v-sheet>
            </v-col>
          </v-row>
        </v-card>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Header from "./Layout/Header.vue";
import Menu from "./Layout/Menu.vue";
export default {
  props: {
    picture: Array,
  },
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