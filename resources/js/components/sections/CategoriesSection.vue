<template>
  <div class="container">
    <h1>Categorie</h1>
        <ul>
            <li v-for="category in categories" :key="category.id">{{category.name}}</li>
        </ul>
  </div>
</template>

<script>

export default {
    name: 'CategoriesSection',
    data() {
        return {
            categories: []
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