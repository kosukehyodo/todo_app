<template>
  <div class="container">
    <div v-for="cardList in cardLists" v-bind:key="cardList.id">
      <div class="card w-25 float-right" style="height:86px;">
        <h5 class="card-header">{{ cardList.title }}</h5>
        <button
          type="button"
          class="btn btn-light text-secondary"
          data-toggle="collapse"
          data-target="#Card"
        >+カードを追加</button>
        <div id="Card" class="collapse">
          <div class="col-xs-5">
            <input type="text" class="form-control mt-2 col-sm-2" v-model="title">
            <div style="margin-left:68px;" class="mt-2">
              <button type="button" class="btn btn-info" @click="addCard()">リストを追加</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card_list">
      <button
        type="button"
        class="btn btn-light text-secondary"
        data-toggle="collapse"
        data-target="#CardList"
      >+リストを追加する</button>
      <div id="CardList" class="collapse">
        <div class="col-xs-5">
          <input type="text" class="form-control mt-2 col-sm-2" v-model="title">
          <div style="margin-left:68px;" class="mt-2">
            <button type="button" class="btn btn-info" @click="addCardList()">リストを追加</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["boardId", "cardLists"],
  data() {
    return {
      title: "",
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
  }
};
</script>

