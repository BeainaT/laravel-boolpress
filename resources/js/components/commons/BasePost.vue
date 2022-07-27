<template>
  <div class="post__card">
    <h3>{{title}}</h3>
    <div class="post__content">
       {{content}}
    </div>
    <a href="">Leggi post</a>
  </div>
</template>

<script>
export default {
    name: 'BasePost',
    props: {
        title: String,
        content: String
    }
}
</script>

<style lang="scss" scoped>
    .post__card {
        background-color: #cecece;
        min-width: 18.75rem;
        padding: 1.25rem;
        border-radius: 2px;
    }
</style>