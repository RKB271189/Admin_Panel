<template>
  <v-app>
    <Header></Header>
    <Menu :page-name="pageName"></Menu>
    <v-main>
      <v-container class="fluid">
        <v-card>
          <v-tabs v-model="tab" color="primary" align-tabs="center">
            <v-tab
              v-for="(tabTitle, index) in tabs"
              :key="index"
              :value="tabTitle"
              >{{ tabTitle }}</v-tab
            >
          </v-tabs>
          <v-window v-model="tab">
            <v-window-item
              v-for="(tabTitle, index) in tabs"
              :key="index"
              :value="tabTitle"
            >
              <v-container fluid>
                <v-row>
                  <v-col md="12">
                    <div>
                      <v-progress-circular
                        indeterminate
                        color="primary"
                        v-if="loading"
                      ></v-progress-circular>
                    </div>
                    <v-table fixed-header height="300px" v-if="!loading">
                      <thead>
                        <tr>
                          <th
                            v-for="(headerTitle, index) in formatHeaders"
                            :key="index"
                            class="text-left"
                          >
                            {{ headerTitle }}
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="item in tabData.data" :key="item.id">
                          <td>{{ item.id }}</td>
                          <td>{{ item.name }}</td>
                          <td>{{ item.price }}</td>
                          <td>{{ item.color }}</td>
                          <td>{{ item.size }}</td>
                        </tr>
                      </tbody>
                    </v-table>
                    <div class="text-center">
                      <v-pagination
                        v-if="!loading && tabData.length !== 0"
                        class="mt-2"
                        v-model="currentPage"
                        :length="totalPage"
                        @update:model-value="onPageChange"
                        prev-icon="mdi-menu-left"
                        next-icon="mdi-menu-right"
                      ></v-pagination>
                    </div>
                  </v-col>
                  <v-col md="12" v-if="tabData.length === 0 && !loading">
                    <no-records></no-records>
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
import NoRecords from "../General/No-Records.vue";
import { mapGetters, mapActions } from "vuex";
export default {
  props: {
    tabs: Array,
    headers: Array,
  },
  components: {
    Header,
    Menu,
    NoRecords,
  },
  data: () => ({
    pageName: "Tables",
    loading: false,
    tab: null,
    tabClicked: [],
    currentPage: 1,
    totalPage: 0,
  }),
  watch: {
    tab() {
      this.tabClicked.push(this.tab);
      let params = {
        tab: this.tab,
        page: this.currentPage,
      };
      this.getTabDetails(params);
    },
  },
  computed: {
    ...mapGetters("Tabular", ["tabData"]),
    formatHeaders() {
      const selectedHeaders = this.headers[this.tab];
      return selectedHeaders ? [...selectedHeaders] : [];
    },
  },
  methods: {
    ...mapActions("Tabular", ["GET_TABLE_DETAILS"]),
    async getTabDetails(params) {
      this.loading = true;
      await this.GET_TABLE_DETAILS({ params: params });
      this.loading = false;
      if (Object.keys(this.tabData).length > 0) {      
        this.totalPage = this.tabData.last_page;
        this.currentPage = this.tabData.current_page;
      }
    },
    onPageChange(newPage) {
      let params = {
        tab: this.tab,
        page: newPage,
      };
      this.getTabDetails(params);
    },
  },
};
</script>

<style>
</style>