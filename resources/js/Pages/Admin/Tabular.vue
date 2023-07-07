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
                        <tr v-for="(item, index) in tabData" :key="item.id">
                          <td>{{ index + 1 }}</td>
                          <td>{{ item.name }}</td>
                          <td>{{ item.price }}</td>
                          <td>{{ item.color }}</td>
                          <td>{{ item.size }}</td>
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
import { mapGetters, mapActions } from "vuex";
export default {
  props: {
    tabs: Array,
    headers: Array,
  },
  components: {
    Header,
    Menu,
  },
  data: () => ({
    pageName: "Tables",
    loading: false,
    tab: null,
    tabClicked: [],
    itemsPerPage: 5,
  }),
  watch: {
    async tab(newTab) {
      this.loading = true;
      this.tabClicked.push(newTab);
      let params = {
        tab: newTab,
      };
      await this.GET_TABLE_DETAILS({ params: params });
      this.loading = false;
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
  },
};
</script>

<style>
</style>