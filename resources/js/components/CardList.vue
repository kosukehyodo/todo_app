<template>
  <list></list>
</template>
<script>
import list from './modules/List'
export default {
  name: "cardList",
  props: ["boardId", "cardLists"],
  data() {
    return {
      title: ""
    };
  },
  methods: {
    addCardList() {
      let url = "/api/card_list";
      axios
        .post(url, {
          board_id: this.boardId,
          title: this.title
        })
        .then(response => {
          console.log("status:", response.status); // 200
          console.log("body:", response.data); // response body.
          this.cardLists.push(response.data[0].title);
        })
        .catch(error => {
          // todo::エラーハンドリング
          alert(error);
          console.log(error.response.data);
          console.log(error.response.status);
          console.log(error.response.statusText);
        });
    }
  },
  components:{
    list
  }
};
</script>

