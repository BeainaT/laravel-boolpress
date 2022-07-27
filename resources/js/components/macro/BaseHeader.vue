<template>
  <header>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Blog</h1>
        </div>
        <div class="col">
          <nav>
            <ul>
              <li>
                <router-link :to="{name: 'home'}">Home</router-link>
                <router-link :to="{name: 'about'}">About us</router-link>
                <a href="admin/home">Area Riservata</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</template>

<script>

export default {
    name: 'BaseHeader'
}
</script>

<style>

</style>