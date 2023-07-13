<template>
  <v-card width="100%">
    <v-card-text>
      <quill-editor theme="snow"></quill-editor>
    </v-card-text>
    <v-card-actions>
      <v-btn color="primary" block @click="closeDialog">Close Dialog</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  methods: {
    closeDialog() {
      this.$emit("close-dialog");
    },
  },
};
</script>

<style>
</style>