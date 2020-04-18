<template>
  <div class="container">
    <form @submit.prevent="addList">
      <input
        type="text"
        class="text-input"
        contenteditable="true"
        v-model="title"
        ref="textInput"
        placeholder="Add new list"
        @focusin="startEditing"
        @focusout="finishEditing"
      />
      <button type="submit" class="add-button"  v-if="isEditing || isAddable">Add</button>
    </form>
  </div>
</template>

<script>
import * as types from '../../store/mutation-types';

const List = {
  data() {
    return {
      isEditing: false,
      title: ""
    };
  },
  computed: {
    titleExists() {
      return this.title.length > 0;
    },
    isAddable() {
      return this.titleExists;
    }
  },
  methods: {
    startEditing() {
      this.isEditing = true;
    },
    finishEditing() {
      this.isEditing = false;
    },
    async addList() {
        // Note::index/addListでやると失敗した
        this.$route.query.page;
        debugger;
        await this.$store.dispatch('addList', this.title, { root: true });
    }
    // addList() {
    //   this.$store.commit(types.ADD_LIST, {
    //     to: this.$parent.index,
    //     title: this.title
    //   });
    //   this.title = "";
    // }
  }
};

export default List;
</script>