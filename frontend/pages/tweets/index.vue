<template>
  <div class="container">
    <h2>Latest Tweets</h2>
    <div v-for="(tweet, index) in tweets" :key="index" class="bg-light mt-5 mb-5">
      <p class="tweet">
        <nuxt-link :to="{name: 'tweets-id', params: {id: tweet.id}}">{{tweet.tweet}}</nuxt-link>
      </p>

      <div v-for="(comment, index) in tweet.comments" :key="index" class="ml-5">
        {{comment.body}}
        <p class="text-muted">{{comment.created_at}} by {{comment.user_id}}</p>
      </div>

      <div v-if="authenticated">
        <div v-if="user.id === tweet.user.id">
          <nuxt-link :to="{name: 'tweets-edit', params: {id: tweet.id}}">Edit</nuxt-link>
        </div>
      </div>

      <p class="text-muted">{{tweet.created_at}} by {{tweet.user.name}}</p>
    </div>
  </div>
</template>

<script>
export default {
  middleware: ["auth"],
  data() {
    return {
      tweets: []
    };
  },
  async asyncData({ $axios }) {
    let { data } = await $axios.$get("/tweets");
    return {
      tweets: data
    };
  }
};
</script>

<style>
.tweet {
  font-size: 20px;
  font-weight: 500;
}
</style>

