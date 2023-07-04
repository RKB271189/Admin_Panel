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
              v-model="price"
              :rules="[(v) => !!v || 'Price is required']"
              label="Price"
            ></v-text-field>
            <v-text-field
              clearable
              variant="outlined"
              v-model="phone"
              :counter="10"
              :rules="phoneRules"
              label="Phone"
              l
            ></v-text-field>
            <v-file-input
              label="Browse Image"
              variant="outlined"
              append-inner-icon="mdi-camera"
              prepend-icon=""
              :rules="imageRules"
              accept="image/png, image/jpeg, image/bmp"
            ></v-file-input>
            <v-select
              v-model="size"
              :items="sizeItem"
              label="Size"
              variant="outlined"
            ></v-select>
            <v-checkbox
              v-model="checkAgree"
              label="Do you agree?"
              type="checkbox"
            ></v-checkbox>
            <v-btn class="me-4" type="button" color="primary"> Submit </v-btn>
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
export default {
  data() {
    return {
      pageName: "Form Details",
      sizeItem: ["x", "m", "l", "xl", "xxl"],
      phoneRules: [
        (v) => !!v || "Phone is required",
        (v) => /[0-9-]+/.test(value) || "E-mail must be valid",
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
      price: null,
      phone: null,
      size: null,
      checkAgree: 1,
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