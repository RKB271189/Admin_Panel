<template>
  <v-app>
    <Header></Header>
    <Menu :page-name="pageName"></Menu>
    <v-main>
      <v-container class="fluid">
        <v-row>
          <v-col md="3">
            <count-box
              :boxColor="'info'"
              :textColor="'white'"
              :countNumber="'25'"
              :countTitle="'User'"
              :iconMain="'mdi-account-star'"
              :moreInfoBackColor="'#007bff'"
              :navigateURL="'login'"
              :enableAction="true"
            ></count-box>
          </v-col>
          <v-col md="3">
            <count-box
              :boxColor="'#ffc107'"
              :textColor="'black'"
              :countNumber="'150'"
              :countTitle="'Orders'"
              :iconMain="'mdi-basket-plus'"
              :moreInfoBackColor="'#fd7e14'"
              :navigateURL="'login'"
              :enableAction="true"
            ></count-box>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="6" md="6">
            <v-card>
              <v-card-title class="alert-warning">
                <span class="headline">Some Title</span>
                <v-btn
                  :loading="false"
                  class="flex-grow-1"
                  height="48"
                  variant="tonal"
                  @click="load"
                  style="float: right"
                >
                  <v-icon class="mr-1">mdi-login</v-icon>
                  Some Action
                </v-btn>
              </v-card-title>
              <v-card-text></v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Header from "./Layout/Header.vue";
import Menu from "./Layout/Menu.vue";
import CountBox from "../General/Count-Box.vue";
export default {
  data() {
    return {
      pageName: "Dashboard",
    };
  },
  components: {
    Header,
    Menu,
    CountBox,
  },
};
</script>