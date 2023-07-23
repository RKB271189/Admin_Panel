<template>
  <v-card>
    <v-card-text>
      <quill-editor
        ref="quillEditor"
        theme="snow"
        :options="editorOptions"
        v-model:content="content"
        contentType="html"
        class="my-quill-editor"
        @text-change="handleTextChange"
      ></quill-editor>
    </v-card-text>
    <v-card-text>
      <v-card-actions>
        <v-btn
          class="flex-grow-1"
          height="48"
          variant="tonal"
          color="info"
          @click="closeDialog"
          style="float: right"
        >
          Close
        </v-btn>
        <v-btn
          class="flex-grow-1"
          height="48"
          variant="tonal"
          color="primary"
          @click="addDetails"
          style="float: right"
          :disabled="!isContentValid"
        >
          Add Details
        </v-btn>
      </v-card-actions>
    </v-card-text>
    <v-card-text>
      <v-alert v-if="!isContentValid" color="error" variant="tonal" outlined>
        Content is required.
      </v-alert>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      content: "",
      isContentValid: false,
      editorOptions: {
        modules: {
          toolbar: [
            [{ header: [1, 2, false] }],
            ["bold", "italic", "underline", "strike"],
            [{ list: "ordered" }, { list: "bullet" }],
            ["link"],
            ["clean"],
          ],
          mention: {
            allowedChars: /^[a-zA-Z0-9_]*$/,
            mentionDenotationChars: ["@"],
            renderItem: (item) => {
              return item.display;
            },
            source: (searchTerm, renderList, mentionChar) => {
              let values = [
                { id: 1, value: "Admin", display: "Admin" },
                { id: 2, value: "Rahul", display: "Rahul" },
              ];

              if (searchTerm.length === 0) {
                renderList(values, searchTerm);
              } else {
                const matches = [];
                for (let i = 0; i < values.length; i++)
                  if (
                    ~values[i].value
                      .toLowerCase()
                      .indexOf(searchTerm.toLowerCase())
                  )
                    matches.push(values[i]);
                renderList(matches, searchTerm);
              }
            },
          },
        },
        placeholder: "Enter your content here",
      },
    };
  },
  watch: {
    content(newContent) {
      console.log(newContent);
      this.isContentValid = newContent.trim() !== "";
    },
  },
  methods: {
    closeDialog() {
      this.$emit("close-dialog");
    },
    addDetails() {
      this.$emit("save-dialog");
    },
    handleTextChange() {
      let isEmptyContent =
        this.content.trim() === "" || this.content === "<p><br></p>";
      if (isEmptyContent) {
        this.content = "";
        this.isContentValid = !isEmptyContent;
      }
    },
  },
};
</script>

<style>
</style>