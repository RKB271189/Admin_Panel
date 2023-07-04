<template>
  <v-app>
    <Header></Header>
    <Menu :page-name="pageName"></Menu>
    <v-main>
      <v-container class="fluid">
        <v-card>
          <v-tabs v-model="tab" color="primary" align-tabs="center">
            <v-tab :value="1">Tab 1</v-tab>
            <v-tab :value="2">Tab 2</v-tab>
            <v-tab :value="3">Tab 3</v-tab>
          </v-tabs>
          <v-window v-model="tab">
            <v-window-item v-for="n in 3" :key="n" :value="n">
              <v-container fluid>
                <v-row>
                  <v-col md="12">
                    <v-table fixed-header height="300px">
                      <thead>
                        <tr>
                          <th class="text-left">Serial No.</th>
                          <th class="text-left">Name</th>
                          <th class="text-left">Price</th>
                          <th class="text-left">Color</th>
                          <th class="text-left">Size</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="item in desserts" :key="item.name">
                          <td>{{ item.name }}</td>
                          <td>{{ item.calories }}</td>
                        </tr>
                      </tbody>
                    </v-table>
                  </v-col>
                </v-row>
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
    pageName: "Tables",
    tab: null,
    desserts: [
      {
        name: "Frozen Yogurt",
        calories: 159,
      },
      {
        name: "Ice cream sandwich",
        calories: 237,
      },
      {
        name: "Eclair",
        calories: 262,
      },
      {
        name: "Cupcake",
        calories: 305,
      },
      {
        name: "Gingerbread",
        calories: 356,
      },
      {
        name: "Jelly bean",
        calories: 375,
      },
      {
        name: "Lollipop",
        calories: 392,
      },
      {
        name: "Honeycomb",
        calories: 408,
      },
      {
        name: "Donut",
        calories: 452,
      },
      {
        name: "KitKat",
        calories: 518,
      },
    ],
  }),
};
</script>

<style>
</style>