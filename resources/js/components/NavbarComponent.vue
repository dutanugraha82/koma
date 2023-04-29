<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow">
  <div class="container-fluid">
    <a class="navbar-brand display-2 roboto-slab" style="font-size:2em" href="/">Koma</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <router-link class="nav-link" aria-current="page" to="/directory">Directory</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/feature">Feature</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/highlight">Highlight</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/showcase">Showcase</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/insight">Insight</router-link>
        </li>
      </ul>
    </div>
  </div>
</nav>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
