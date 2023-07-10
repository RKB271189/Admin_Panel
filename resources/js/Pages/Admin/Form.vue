<template>
  <v-app>
    <Header></Header>
    <Menu :page-name="pageName"></Menu>
    <v-main>
      <response-message
        v-if="hasError || hasSuccess"
        :errorFlag="hasError"
        :errorMessage="errorMessage"
        :successMessage="successMessage"
      ></response-message>
      <v-container class="fluid">
        <v-row>
          <v-col md="12">
            <form @submit.prevent="saveForm" enctype="multipart/form-data">
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
                :rules="decimalRules"
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
                ref="profile_pic"
                label="Browse Image"
                variant="outlined"
                append-inner-icon="mdi-camera"
                prepend-icon=""
                :rules="imageRules"
                accept="image/png, image/jpeg"
                @change="handleFileChange"
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
                type="submit"
                color="primary"
                :disabled="isFormValidated"
                :loading="loading"
              >
                Submit
              </v-btn>
              <v-btn @click="handleReset" color="info"> Clear </v-btn>
            </form>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Header from "./Layout/Header.vue";
import Menu from "./Layout/Menu.vue";
import ResponseMessage from "../General/Response-Message.vue";
import { commonGettersMixin } from "../../mixins/response-message";
import { mapGetters, mapActions } from "vuex";
export default {
  components: {
    Header,
    Menu,
    ResponseMessage,
  },
  mixins: [commonGettersMixin("Form")],
  data() {
    return {
      pageName: "Form Details",
      loading: false,
      sizeItem: ["1-10", "11-30", "30-50", "50-100", ">100"],
      decimalRules: [
        (v) => !!v || "Salary is required",
        (v) => /^\d+(\.\d+)?$/.test(v) || "Salary should be a valid number",
      ],
      phoneRules: [
        (v) => !!v || "Phone number is required",
        (v) => /[0-9-]+/.test(v) || "Phone number must be valid",
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
    ...mapGetters("Form", ["formData"]),
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
    ...mapActions("Form", ["SAVE_FORM_DETAILS"]),
    getParams() {
      return {
        name: this.name,
        phone: this.phone,
        salary: this.salary,
        profile_pic: this.profile_pic,
        company_size: this.company_size,
      };
    },
    handleFileChange() {
      this.profile_pic = this.$refs.profile_pic.files[0];
    },
    async saveForm() {
      this.loading = true;
      let params = this.getParams();
      await this.SAVE_FORM_DETAILS(params);
      this.loading = false;
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