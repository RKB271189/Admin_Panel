<template>
  <v-snackbar
    v-model="snackbar"
    timeout="5000"
    location="top right"
    multi-line
    :color="messageColor"
  >
    <v-layout align-center pr-4>
      <v-icon class="pr-3" dark large>{{ responseIcon }}</v-icon>
      <v-layout column>
        <div>
          <strong>{{ responseType }} : </strong>
        </div>
        <div>{{ text }}</div>
      </v-layout>
    </v-layout>
  </v-snackbar>
</template>
  <script>
export default {
  data() {
    return {
      messageColor: "red-darken-2",
      responseType: "Error",
      text: "",
      responseIcon: "mdi-alert-circle-outline",
      snackbar: true,
    };
  },
  props: {
    responseMessage: null,
    errorFlag: {
      type: Boolean,
      required: true,
    },
  },
  created: function () {
    if (!this.errorFlag) {
      this.messageColor = "green-darken-2";
      this.responseType = "Success";
      this.responseIcon = "mdi-check-circle-outline";
    }
    let result = [];
    for (let [key, value] of Object.entries(this.responseMessage)) {
      result.push(`${value}`);
    }
    this.text = result.join(" and ");
  },
};
</script>