<template>
  <div class="container">
    <div class="bg-light mt-5 mb-5">
      <p class="tweet">{{tweet.tweet}}</p>
      <hr />
      <p class="text-muted">{{tweet.created_at}} by {{tweet.user.name}}</p>
      <div v-for="(comment, index) in tweet.comments" :key="index" class="ml-5">
        <p>{{comment.body}}</p>
        <p class="text-muted">{{comment.created_at}} by {{comment.user_id}}</p>
        <div v-if="authenticated">
          <div v-if="user.id === comment.user_id">
            <nuxt-link
              :to="{name: 'tweets-comments-edit', params: {id: $route.params.id, body: comment.id}}"
            >
              <button class="btn btn-outline-primary pull-right">Edit</button>
            </nuxt-link>
            <button class="btn btn-outline-danger" @click="deleteComment(comment.id)">Delete</button>
          </div>
        </div>
        <hr />
      </div>
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
    },
    async deleteComment(id) {
      await this.$axios.$delete(
        `/tweets/${this.$route.params.id}/comments/${id}`
      );
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
