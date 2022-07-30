<template>
    <div class="container">
        <template v-if="(post != null)">
            <h1>{{post.title}}</h1>
            <p>{{post.content}}</p>
            <template v-if="post.image_path != null">
                <img :src="post.image_path" alt="post related img" width="200">
            </template>
            <h4>{{post.user.name}} {{post.author_lastname}}</h4>
        </template>
        <form class="col-6 px-0" @submit.prevent="addComment()">
            <div class="form-group">
                <label for="author">Autore</label>
                <input name="author" type="text" class="form-control" id="author" v-model="formComments.author">
            </div>
            <div class="form-group">
                <label for="comments">Commento</label>
                <textarea name="content" class="form-control" id="comments" rows="4" v-model="formComments.content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Invia commento</button>
        </form>
        <template v-if="isSent">
            <h3>Lista commenti</h3>
            <ul>
                <li>
                    <h5>{{message.author}}</h5>
                    <p>{{message.content}}</p>
                </li>
            </ul>
        </template>
    </div>
</template>

<script>

export default {
    name: 'CheckPost',
    data() {
        return {
            post: null,
            formComments: {
                author: '',
                content: ''
            },
            message: {},
            isSent: false,
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
    },
    methods: {
        addComment() {
            axios.post(`/api/comments/${this.post.id}`, this.formComments)
                .then(res => {
                    this.message = res.data;
                    this.formComments.author = "";
                    this.formComments.content = "";
                    this.isSent = true;
                    console.log(this.message)
                })
            // console.log(this.formComments)
        }
    }

}
</script>

<style>

</style>