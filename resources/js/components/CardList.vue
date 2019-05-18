<template>
  <div class="container">
    <button
      type="button"
      class="btn btn-light text-secondary"
      data-toggle="collapse"
      data-target="#demo"
    >+リストを追加する</button>
    <div id="demo" class="collapse">
      <div class="col-xs-5">
        <input type="text" class="form-control mt-2 col-sm-2" v-model="title">
        <div style="margin-left:68px;" class="mt-2">
          <button type="button" class="btn btn-info" @click="submit()">リストを追加</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["boardId"],
  data() {
    return {
      title: ""
    };
  },
  methods: {
    submit() {
      let url = "/api/card_list/store";
      axios
        .post(url, {
          board_id: this.boardId,
          title: this.title
        })
        .then(response => {
          console.log("status:", response.status); // 200
          console.log("body:", response.data); // response body.
        })
        .catch(error => {
          alert(error);
          console.log(error.response.data);
          console.log(error.response.status); // 例：400
          console.log(error.response.statusText); // Bad Request
        });
    }
  }
};
</script>
