<template>
  <v-app>
    <Header></Header>
    <Menu :page-name="pageName"></Menu>
    <v-main>
      <v-container class="fluid">
        <v-card>
          <v-tabs
            v-model="tab"
            color="deep-purple-accent-4"
            align-tabs="center"
          >
            <v-tab :value="1">Tab 1</v-tab>
            <v-tab :value="2">Tab 2</v-tab>
            <v-tab :value="3">Tab 3</v-tab>
          </v-tabs>
          <v-window v-model="tab">
            <v-window-item v-for="n in 3" :key="n" :value="n">
              <v-container fluid>
                <v-row> </v-row>
              </v-container>
            </v-window-item>
          </v-window>
        </v-card>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Header from "./Layout/Header.vue";
import Menu from "./Layout/Menu.vue";
export default {
  components: {
    Header,
    Menu,
  },
  data: () => ({
    pageName: "Table",
    tab: null,
  }),
};
</script>

<style>
</style>