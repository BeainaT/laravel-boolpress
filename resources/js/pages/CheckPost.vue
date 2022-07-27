<template>
    <div class="container">
        <template v-if="(post != null)">
            <h1>{{post.title}}</h1>
            <p>{{post.content}}</p>
            <h4>{{post.user.name}} {{post.author_lastname}}</h4>
        </template>
    </div>
</template>

<script>

export default {
    name: 'CheckPost',
    data() {
        return {
            post: null
        }
    },
    created() {
        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then(res => {
                this.post = res.data
            })
            .catch(e => {
                console.log(e)
            })
    }
}
</script>

<style>

</style>