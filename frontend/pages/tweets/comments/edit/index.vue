<template>
  <div class="container">
    <h1>Update Comment</h1>

    <form @submit.prevent="update">
      <div class="form-group mt-5">
        <input type="text" class="form-control" v-model="comment.body" />
        <small v-if="errors.body" class="form-text text-danger">{{errors.body[0]}}</small>
      </div>
      <button class="btn btn-outline-success">Update</button>
      <button class="btn btn-outline-danger" @click="deleteTweet(tweet.id)">Delete</button>
    </form>
    <p class="mt-5 btn-outline-waring">
      <nuxt-link to="/tweets">Back to tweets</nuxt-link>
    </p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      comment: {
        body: ""
      }
    };
  },
  async asyncData({ $axios, params }) {
    const { data } = await $axios.$get(
      `/tweets/${params.id}/comments/${params.body}`
    );
    return { comment: data };
  },
  methods: {
    async update() {
      await this.$axios.$patch(
        `/tweets/${this.$route.params.id}/comments/${this.$route.params.body}`,
        {
          body: this.comment.body
        }
      );
      this.$router.push("/tweets");
    },
    async deleteTweet(id) {
      await this.$axios.$delete(`/tweets/${id}`);
      this.$router.push("/tweets");
    }
  }
};
</script>
