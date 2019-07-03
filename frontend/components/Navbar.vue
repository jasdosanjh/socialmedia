
<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="primary" class="mb-5">
      <nuxt-link to="/" class="navbar-brand">Social Media</nuxt-link>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <nuxt-link to="/tweets" class="nav-link">Home</nuxt-link>
          <nuxt-link to="/profile" class="nav-link">Profile</nuxt-link>
          <nuxt-link to="/dashboard" class="nav-link">Tweet</nuxt-link>
        </b-navbar-nav>

        <template v-if="!authenticated">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <nuxt-link to="/login" class="nav-link">Login</nuxt-link>
            </li>
            <li class="nav-item">
              <nuxt-link to="/register" class="nav-link">Register</nuxt-link>
            </li>
          </ul>
        </template>

        <template v-if="authenticated">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link">{{user.name}}</a>
            </li>
            <li class="nav-item">
              <a @click.prevent="logout" class="nav-link">Logout</a>
            </li>
          </ul>
        </template>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  methods: {
    logout() {
      this.$auth.logout();
    }
  }
};
</script>

<style>
a {
  cursor: pointer; /* test purposes only, remove later and style properly */
}
</style>
