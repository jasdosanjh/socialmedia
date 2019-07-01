<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <nuxt-link to="/" class="navbar-brand">Social Media</nuxt-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
            <nuxt-link to="/" class="nav-link">Home</nuxt-link>
        </li>
        <li class="nav-item">
          <nuxt-link to="/" class="nav-link">Profile</nuxt-link>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
              <li class="nav-item">
          <nuxt-link to="/login" class="nav-link">Login</nuxt-link>
        </li>
        <li class="nav-item">
          <nuxt-link to="/register" class="nav-link">Register</nuxt-link>
        </li>
      </ul>
    </div>
  </nav>
</template>
