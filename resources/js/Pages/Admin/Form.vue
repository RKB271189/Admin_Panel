<template>
  <v-app>
    <Header></Header>
    <Menu :page-name="pageName"></Menu>
    <v-main>
      <v-container class="fluid">
        <v-row>
          <v-col md="12">
            <v-text-field
              clearable
              variant="outlined"
              v-model="name"
              :rules="[(v) => !!v || 'Name is required']"
              label="Name"
            ></v-text-field>
            <v-text-field
              clearable
              variant="outlined"
              v-model="salary"
              :rules="[(v) => !!v || 'Price is required']"
              label="Salary"
              class="pt-2"
            ></v-text-field>
            <v-text-field
              clearable
              variant="outlined"
              v-model="phone"
              :counter="10"
              :rules="phoneRules"
              label="Phone"
              class="pt-2"
            ></v-text-field>
            <v-file-input
              v-model="profile_pic"
              label="Browse Image"
              variant="outlined"
              append-inner-icon="mdi-camera"
              prepend-icon=""
              :rules="imageRules"
              accept="image/png, image/jpeg"
              class="pt-2"
            ></v-file-input>
            <v-select
              v-model="company_size"
              :items="sizeItem"
              label="Size"
              variant="outlined"
              class="pt-2"
            ></v-select>
            <v-checkbox
              v-model="checkAgree"
              label="Do you agree?"
              type="checkbox"
              class="pt-2"
            ></v-checkbox>
            <v-btn
              class="me-4"
              type="button"
              color="primary"
              @click="saveProfile"
              :disabled="isFormValidated"
            >
              Submit
            </v-btn>
            <v-btn @click="handleReset" color="info"> Clear </v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Header from "./Layout/Header.vue";
import Menu from "./Layout/Menu.vue";
import { mapGetters, mapActions } from "vuex";
export default {
  components: {
    Header,
    Menu,
  },
  data() {
    return {
      pageName: "Form Details",
      sizeItem: ["1-10", "11-30", "30-50", "50-100", ">100"],
      phoneRules: [
        (v) => !!v || "Phone number is required",
        (v) => /[0-9-]+/.test(value) || "Phone number must be valid",
      ],
      imageRules: [
        (value) => {
          return (
            !value ||
            !value.length ||
            value[0].size < 2000000 ||
            "Image size should be less than 2 MB!"
          );
        },
      ],
      name: null,
      salary: null,
      phone: null,
      company_size: null,
      profile_pic: null,
      checkAgree: 1,
    };
  },
  computed: {
    isFormValidated() {
      return (
        !this.name ||
        !this.phone ||
        !this.salary ||
        !this.profile_pic ||
        !this.company_size
      );
    },
  },
  methods: {
    getParams() {
      return {
        name: this.name,
        phone: this.phone,
        salary: this.salary,
        profile_pic: this.profile_pic,
        company_size: this.company_size,
      };
    },
    async saveProfile() {
      let params = this.getParams();
    },
    handleReset() {
      this.name = null;
      this.salary = null;
      this.phone = null;
      this.company_size = null;
      this.profile_pic = null;
    },
  },
};
</script>

<style>
</style>