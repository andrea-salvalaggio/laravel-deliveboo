<template>
  <div>
    <!-- banner -->

    <!-- categorie -->
    <div class="container-fluid slider">
      <div class="row flex-nowrap "> 
        <div class="col-6 col-md-2 my-4" v-for="category in categories" :key="category.id">
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
    .slider{
      width: 100%;
      height: 200px;
      overflow-x: scroll;
      &::-webkit-scrollbar {
        height: 5px;
        border-radius: 5px;

      }

    /* Track */
        &::-webkit-scrollbar-track {
          background: transparent;
          
        }

    /* Handle */
        &::-webkit-scrollbar-thumb {
          background: $primaryColor;
          border-radius: 5px;
        }
    }
    
  
</style>