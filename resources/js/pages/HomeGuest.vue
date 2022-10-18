<template>
  <div>
    <!-- banner -->

    <!-- categorie -->
    <div class="container-lg">
      <div class="row">
        <CategoryComponent v-for="category in categories" :key="category.id" :category="category" />
      </div>
    </div>

  </div>
</template>

<script>
import axios from 'axios';
import CategoryComponent from '../components/CategoryComponent.vue';
export default {
  components:{
    CategoryComponent,
  },
  data: function(){
    return{
      categories: [],
    }
  },
  methods:{
    //! funzione per effettuare la chiamata 
    ApiCallAllCategories(){
      axios.get('/api/category')
      .then((result)=>{
        this.categories= result.data.results
        console.log(this.categories)
      })
      .catch((error)=>{
        console.error(error)
      })
    }
  },
  created(){
    this.ApiCallAllCategories()
  }
}
</script>

<style>

</style>