<template>
  <section>
      <div class="banner-container d-flex justify-content-center">
          <img class="img-fluid" :src="restaurant.restaurantPic" :alt="restaurant.name">
      </div>

      <div class="container">
        <div class="row">
          <div class="col-12 text-center mt-5">
            <h2>Restaurant Menu</h2>
            <div class="menu-container d-flex flex-wrap">
              <DishCard v-for="dish in restaurant.dishes" :key="dish.id" :dish="dish"/>
              <DishCard v-for="dish in restaurant.dishes" :key="dish.id" :dish="dish"/>
            </div>
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
            axios.get(`http://127.0.0.1:8000/api/restaurant/1`)
                .then((response) => {
                console.log(response.data.results);
                this.restaurant = response.data.results;
            }).catch((error) => {
                console.warn(error);
            });
        }
    },
    created() {
        this.getRestaurant();
    },
    components: { DishCard }
}
</script>

<style lang="scss" scoped>
.banner-container{
  img{
    border-radius: 30px;
  }
  
}
</style>