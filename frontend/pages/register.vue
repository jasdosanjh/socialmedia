<template>
  <div class="container col-md-6 mt-5">
    <h2>Register</h2>
    <br>
    <form>
      <div class="form-group">
        <label>Full Name</label>
        <input type="text" class="form-control" placeholder="Enter your name">
        <small class="form-text text-danger">Show error message here.</small>
      </div>
      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" placeholder="Enter email">
        <small class="form-text text-danger">Show error message here.</small>
      </div>
      <div class="form-group">
        <label >Password</label>
        <input type="password" class="form-control" placeholder="Password">
        <small class="form-text text-danger">Show error message here.</small>
      </div>
      <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
    <br>
    <p>Don't have an account yet? <nuxt-link to="/register">Register</nuxt-link></p>
  </div>
</template>
