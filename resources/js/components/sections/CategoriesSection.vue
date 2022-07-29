<template>
  <div class="container">
    <h1>Categorie</h1>
        <template :v-if="categories.lenght > 0">
        <ul>
            <li v-for="category in categories" :key="category.id">
                <router-link :to="{ name: 'check-category', params: {slug: category.slug }}">
                    {{category.name}}
                </router-link>
            </li>
        </ul>
        </template>
  </div>
</template>

<script>

export default {
    name: 'CategoriesSection',
    data() {
        return {
            categories: [],
        }
    },
    created() {
        axios.get('api/categories')
            .then(res => {
                this.categories = res.data;
            })
            .catch(e => {
                console.log(e)
            })
    }
}
</script>

<style>

</style>