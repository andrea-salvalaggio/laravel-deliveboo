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
      <h1 class="text-center my-4">
        {{ restaurant.name }}
      </h1>
    </div>

    <div class="container-fluid">
      <div class="row">

        <!-- Menu -->        
        <div class="col-lg-8 col-12">
          <div class="menu-container m-0 my-rounded py-4 px-5 mx-auto ">
            <h3 class="text-capitalize border-bottom py-4 m-0">menu</h3>
            <div class="row mt-5">
              <div class="col-12 col-md-4 mb-4 mt-0" v-for="dish in restaurant.dishes" :key="dish.id">
                <div class="dish-card d-flex align-items-end flex-wrap  my-shadow">
                  <div class="col-12 img-container ">
                      <img class="img-fluid image" :src="checkUrl(dish.dishPic)" :alt="dish.name">
                  </div>
                  <div class="d-flex justify-content-between align-items-center w-100 mt-3">
                    <div>
                      <div class="text-left font-weight-bold col-12 text-capitalize px-4">
                        {{ dish.name }}
                      </div>

                       <div class="text-left font-weight-bold col-12 text-capitalize px-4 mb-3">
                        <span class="euro">€ </span>{{ dish.price }}
                      </div>
                    </div>

                    <div class="add-button-container mx-3 mb-3" @click="addToCart(dish)">
                      <div class="add-button">
                        +
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Carrello -->
        <div class="col-lg-4 col-12">
          <div class="menu-container m-0 my-rounded py-4 px-5 mx-auto ">
            <h3 class="text-capitalize border-bottom py-4 m-0"><i class="fa-solid fa-cart-shopping"></i> cart</h3>
            <div class="row bg-white my-shadow my-rounded mt-5">
              <div class="col-12 cart p-5">
                  <div class="row" v-for="(cartItem , index) in cart" :key="index" >
                    <div class="col-9 text-capitalize">
                      {{ cartItem.name }}
                    </div>
                    <div class="col-3">
                      € {{ cartItem.price }}
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios'

export default {
    data: function () {
        return {
            restaurant: {},
            cart: [],
            counter : 0
        };
    },
    methods: {
        getRestaurant() {
            axios.get(`http://127.0.0.1:8000/api/restaurant/${this.$route.params.id}`)
                .then((response) => {
                this.restaurant = response.data.results;
            }).catch((error) => {
                console.warn(error);
            });
        },

        //! funzione che pusha in un array i piatti selezionati
        addToCart(dish){
          /* if(this.cart.includes(dish)){
            console.log(this.cart.quantity)
          }
          else{ */
            /* dish.quantity = 1 */
            this.cart.push(dish)
            console.log(this.cart)
          /* } */
        },

        //! funzione che controlla il path delle immagini se sono link o immagini caricate
        checkUrl(img){
            console.log()
            if(img.includes('http')){
                return img
            }else{
              return '/storage/'+img
            }
        },
        
    },
    created() {
        this.getRestaurant();
    },
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
.cart{
  min-height: 500px;
  max-height: 800px;
  overflow-y: scroll;
}

.dish-card {
    background-color: white;
    border-radius: 30px;
    width: 98%;
}

.euro {
    color: $primaryColor;
}

.img-container {
    padding: 0;
    margin: 0;
    width: 334px;
    height: 250px;
    .image {
        object-fit: contain;
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        height: 100%;
        width: 100%;
    }
}

.add-button-container{
    background-color: green;
    color: white;
    font-size: 25px;
    border-radius: 50%;
    height: 40px;
    width: 40px;
    text-align: center;
    line-height: 40px;
    cursor: pointer;
}
</style>