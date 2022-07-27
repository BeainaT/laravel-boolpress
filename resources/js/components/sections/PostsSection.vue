<template>
  <section>
    <div class="container">
      <ul>
        <li v-for="post in posts" :key="post.id">
          <BasePost :title="post.title" :content="post.content" :slug="post.slug"/>
        </li>
      </ul>
    </div>
  </section>
</template>


<script>
import BasePost from '../commons/BasePost.vue';
export default {
    name: "PostsSection",
    data() {
        return {
            posts: []
        };
    },
    created() {
        axios.get("/api/posts")
            .then(res => {
            this.posts = res.data;
        })
            .catch(e => {
            console.log(e);
        });
    },
    components: { BasePost }
}
</script>

<style lang="scss" scoped>
  ul {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    gap: 1.5625rem;
  }
</style>