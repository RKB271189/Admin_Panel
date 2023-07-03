<template>
  <response-message
    v-if="hasError || hasSuccess"
    :errorFlag="hasError"
    :responseMessage="errorMessage || successMessage"
  ></response-message>
  <v-container class="fill-height">
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="4">
        <v-card>
          <v-card-title class="text-center"> Login Form </v-card-title>
          <v-card-text>
            <v-text-field
              v-model="email"
              label="Username"
              required
            ></v-text-field>
            <v-text-field
              v-model="password"
              label="Password"
              type="password"
              required
            ></v-text-field>
            <v-btn
              type="button"
              :loading="loading"
              class="flex-grow-1"
              height="48"
              color="primary"
              @click="verifyUser()"
              block
            >
              <v-icon class="mr-1">mdi-login</v-icon>
              Login
            </v-btn>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import ResponseMessage from "../General/Response-Message.vue";
import { mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      loading: false,
      email: null,
      password: null,
    };
  },
  components: {
    ResponseMessage,
  },
  computed: {
    ...mapGetters("VerifyUser", [
      "hasError",
      "errorMessage",
      "hasSuccess",
      "successMessage",
    ]),
  },
  beforeUnmount() {
    this.RESET_TO_INITIAL_STATE();
  },
  methods: {
    ...mapActions("VerifyUser", [
      "RESET_TO_INITIAL_STATE",
      "VERIFY_USER_CREDENTIALS",
    ]),
    getParams() {
      return {
        email: this.email,
        password: this.password,
      };
    },
    async verifyUser() {
      this.loading = true;
      let params = this.getParams();
      await this.VERIFY_USER_CREDENTIALS(params);
      this.loading = false;
      if (!this.hasError) {
        this.$inertia.visit("admin-dashboard", { method: "get" });
      }
    },
  },
};
</script>

<style>
</style>