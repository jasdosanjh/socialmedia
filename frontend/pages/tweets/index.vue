<template>
  <div class="container">
    <h2>Latest Tweets</h2>
    <div v-for="(tweet, index) in tweets" :key="index" class="bg-light mt-5 mb-5">
      <p class="tweet">{{tweet.tweet}}</p>
      <p class="text-muted">{{tweet.created_at}} by {{tweet.user.name}}</p>
    </div>
  </div>
</template>

<script>
export default {
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

