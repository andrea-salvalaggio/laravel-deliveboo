<template>
  <div>
    <!-- banner -->

    <!-- categorie -->
    <div class="container-lg">
      <div class="row"> 
        <div class="col-3 my-4" v-for="category in categories" :key="category.id">
          <div class="mx-auto  my-rounded my-shadow order-card d-flex align-items-center justify-content-center text-capitalize"  :id="'categoria'+category.id"
              @click="activeCard(category)" >
              {{ category.name }}
          </div>
         </div>
      </div>
    </div>

  </div>
</template>

<script>
import axios from 'axios';
export default {
  components:{
  },
  data: function(){
    return{
      categories: [],
      currentActive: '',
      isClicked: false,
      idCategory: null,
      activeClass: '',
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
    },
    activeCard(category){
      if( document.querySelector('.active-card') != null ){
        document.querySelector('.active-card').classList.remove('active-card')
      }
      this.idCategory = category.id
      this.currentActive= document.getElementById('categoria'+this.idCategory).classList.add('active-card')

      console.log(this.idCategory)
      /* if(this.currentActive == this.idCategory &&) */
    }
  },
  created(){
    this.ApiCallAllCategories()
  }
}
</script>

<style scoped lang="scss">
 @import '../../sass/variables';

    .order-card{
        width: 90%;
        height: 100px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: $secondaryColor;
        cursor: pointer;
    }
    .active-card{
        background-color: $primaryColor;
        color: white;
    } 
</style>