<template>
  <div class="container">
    <template v-if="category != null">
        <h1>{{category.name}}</h1>
        <h2>posts associati:</h2>
        <ul>
            <li v-for="post in category.posts" :key="post.id">
                <h3>{{post.title}}</h3>
                <p>{{post.content}}</p>
                <h4>{{post.author_name}} {{post.author_lastname}}</h4>
            </li>
        </ul>
    </template>
  </div>
</template>

<script>

export default {
    name: 'CheckCategory',
    data() {
        return {
            category: null
        }
    },
    created() {
        axios.get(`/api/categories/${this.$route.params.slug}`)
            .then(res => {
                this.category = res.data;
            })
    }
}
</script>

<style>

</style>