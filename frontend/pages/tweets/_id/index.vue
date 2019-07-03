<template>
  <div class="container">
    <div class="bg-light mt-5 mb-5">
      <p class="tweet">{{tweet.tweet}}</p>
      <hr />
      <p class="text-muted">{{tweet.created_at}} by {{tweet.user.name}}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tweet: ""
    };
  },
  async asyncData({ $axios, params }) {
    const { data } = await $axios.$get(`/tweets/${params.id}`);
    return {
      tweet: data
    };
  }
};
</script>

<style>
.tweet {
  font-size: 20px;
}
</style>
