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
          <v-col cols="12" md="12">
            <v-card>
              <v-card-title class="alert-warning">
                <span class="headline">Some Title</span>
                <v-dialog v-model="dialog" width="60%">
                  <template v-slot:activator="{ props }">
                    <v-btn
                      class="flex-grow-1"
                      height="48"
                      variant="tonal"
                      color="primary"
                      v-bind="props"
                      style="float: right"
                    >
                      <v-icon class="mr-1">mdi-alert-outline</v-icon>
                      Open Dialog
                    </v-btn>
                  </template>
                  <dashboard-form
                    @close-dialog="closeDialog"
                    @save-dialog="saveDialog"
                  ></dashboard-form>
                </v-dialog>
              </v-card-title>
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
import DashboardForm from "./Dialogs/DashboardForm.vue";
import { mapActions } from "vuex";
export default {
  data() {
    return {
      dialog: false,
      loading: false,
      pageName: "Dashboard",
    };
  },
  components: {
    Header,
    Menu,
    CountBox,
    DashboardForm,
  },
  methods: {
    ...mapActions("Dashboard", ["SOME_SERVER_ACTION"]),
    async someAction() {
      this.loading = true;
      await this.SOME_SERVER_ACTION();
      this.loading = false;
    },
    closeDialog() {
      this.dialog = false;
    },
    saveDialog() {},
  },
};
</script>