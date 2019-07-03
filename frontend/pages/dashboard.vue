<template>
  <div class="container col-md-6 mt-5">
    <h2>Create a new Tweet!</h2>
    <hr />
    <form @submit.prevent="create">
      <div class="form-group">
        <label>
          <strong>What's on your mind?</strong>
        </label>
        <input
          v-model="form.tweet"
          type="text"
          class="form-control"
          placeholder="Enter tweet"
          autofocus
        />
        <small class="form-text text-danger" v-if="errors.tweet">{{errors.tweet[0]}}</small>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
</template>

<script>
export default {
  middleware: ["auth"],
  data() {
    return {
      form: {
        tweet: ""
      }
    };
  },
  methods: {
    async create() {
      await this.$axios
        .$post("/tweets", this.form)
        .then(data => {
          console.log(data);
          this.$router.push("/");
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>
