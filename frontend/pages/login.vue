<template>
  <div class="container col-md-6 mt-5">
    <h2>Login</h2>
    <br />
    <form @submit.prevent="submit">
      <div class="form-group">
        <label>Email address</label>
        <input
          v-model.trim="form.email"
          type="email"
          class="form-control"
          placeholder="Enter email"
          autofocus
        />
        <small class="form-text text-danger" v-if="errors.email">{{errors.email[0]}}</small>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input
          v-model.trim="form.password"
          type="password"
          class="form-control"
          placeholder="Password"
        />
        <small class="form-text text-danger" v-if="errors.password">{{errors.password[0]}}</small>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <br />
    <p>
      Don't have an account yet?
      <nuxt-link to="/register">Register</nuxt-link>
    </p>
  </div>
</template>

<script>
export default {
  middleware: ["guest"],
  data() {
    return {
      form: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
    submit() {
      this.$auth
        .loginWith("local", {
          data: {
            email: this.form.email,
            password: this.form.password
          }
        })
        .then(data => {
          console.log(data);
          this.$router.push({
            path: this.$route.query.redirect || "/tweets"
          });
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>
