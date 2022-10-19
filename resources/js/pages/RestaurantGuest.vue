<template>
  <section>
<!--       <div class="banner-container d-flex justify-content-center">
          <img :src="restaurant.restaurantPic" :alt="restaurant.name">
      </div>

      <div class="container">
        <div class="row">
          <div class="col-12 text-center my-5">
            <h2>Restaurant Menu</h2>
            <div class="menu-container d-flex flex-wrap">
              <DishCard v-for="dish in restaurant.dishes" :key="dish.id" :dish="dish"/>
            </div>
          </div>
        </div>
      </div> -->
      <!-- junbo -->
    <div class="jumbo">
        <img :src="restaurant.restaurantPic" :alt="restaurant.name + 'photo'">
    </div>
    <!-- restaurant name -->
    <div class="container-lg py-4">
      <h1>
        {{ restaurant.name }}
      </h1>
    </div>

    <div class="container-fluid">
      <div class="row">

        <!-- Menu -->        
        <div class="col-lg-8 col-12">
          <div class="menu-container my-rounded py-4 px-5 mx-auto">
            <h3 class="text-uppercase mb-3 my-rounded bg-white p-4">menu</h3>
            <div class="row">
              <DishCard v-for="dish in restaurant.dishes" :key="dish.id" :dish="dish"/>
            </div>
          </div>
        </div>

        <!-- Carrello -->
        <div class="col-lg-4 col-12">

        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios'
import DishCard from '../components/DishCard.vue'

export default {
    data: function () {
        return {
            restaurant: {},
        };
    },
    methods: {
        getRestaurant() {
            axios.get(`http://127.0.0.1:8000/api/restaurant/${this.$route.params.id}`)
                .then((response) => {
                console.log(response.data.results);
                this.restaurant = response.data.results;
            }).catch((error) => {
                console.warn(error);
            });
        },
        
    },
    created() {
        this.getRestaurant();
    },
    components: { DishCard }
}
</script>

<style lang="scss" scoped>
 @import '../../sass/variables';

/* .menu-container{
  row-gap: 35px;
}
.banner-container{
  img{
    border-radius: 30px;
    width: 100%;
  }
  width: 1266px;
  margin: 0 auto;
} */

.jumbo{
  height: 400px;
  width: 100%;
  img{
    width: 100%;
    height: 400px;
    object-fit: cover;
  }
}
.container-lg{
  h1{
    font-weight: 600;
  }
}
.menu-container{
  width: 95%;
  h3{
    font-size: 2rem;
    font-weight: 600;
    color: $secondaryColor;
  }
}
</style>