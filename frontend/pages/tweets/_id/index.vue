<template>
  <div class="container">
    <div class="bg-light mt-5 mb-5">
      <p class="tweet">{{tweet.tweet}}</p>
      <hr />
      <p class="text-muted">{{tweet.created_at}} by {{tweet.user.name}}</p>
    </div>

    <!-- Comments -->
    <div class="mt-5" v-if="authenticated">
      <form @submit.prevent="create">
        <div class="form-group">
          <h4>Add a comment</h4>
          <input v-model="body" type="text" class="form-control" placeholder="Comment..." />
          <small v-if="errors.body" class="form-text text-danger">{{errors.body[0]}}</small>
        </div>
        <button class="btn btn-outline-primary">Add Comment</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  middleware: ["auth"],
  data() {
    return {
      tweet: "",
      body: ""
    };
  },
  async asyncData({ $axios, params }) {
    const { data } = await $axios.$get(`/tweets/${params.id}`);
    return {
      tweet: data
    };
  },
  methods: {
    async create() {
      await this.$axios.$post(`/tweets/${this.$route.params.id}/comments`, {
        body: this.body,
        tweet_id: this.tweet.id,
        user_id: this.user.id
      });
      this.$router.push("/tweets");
    }
  }
};
</script>

<style>
.tweet {
  font-size: 20px;
}
</style>
