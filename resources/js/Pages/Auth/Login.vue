<template>
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
            <v-btn type="button" color="primary" @click="verifyUser()" block
              >Login</v-btn
            >
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data() {
    return {
      email: null,
      password: null,
    };
  },
  computed: {
    ...mapGetters("VerifyUser", ["hasError", "errorMessage"]),
  },
  methods: {
    ...mapActions("VerifyUser", ["VERIFY_USER_CREDENTIALS"]),
    getParams() {
      return {
        email: this.email,
        password: this.password,
      };
    },
    async verifyUser() {
      let params = this.getParams();
      await this.VERIFY_USER_CREDENTIALS(params);
      if (!this.hasError) {
        this.$inertia.visit("admin-dashboard", { method: "get" });
      }
    },
  },
};
</script>

<style>
</style>