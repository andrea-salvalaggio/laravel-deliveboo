<template>
  <div>
    <!-- banner -->
    <div class="container-jumbo d-none d-lg-block position-relative">
      <!-- testo principale -->
      <div class="container-lg">
        <div class="row">
          <div class="col-8">
            <h1 class="text-white big-title">
              Restaurant <span>Food</span>, takeaway and groceries
              <span>Delivered</span>.
            </h1>
          </div>
        </div>
      </div>
    </div>

    <!-- categorie -->
    <div class="container-fluid bg-light">
      <div class="container-lg slider">
        <div class="row flex-nowrap">
          <div class="col-6 col-lg-2 my-3" v-for="category in categories" :key="category.id">
            <div class="mx-auto my-rounded order-card d-flex align-items-center justify-content-center text-capitalize"
              :id="'categoria' + category.id" @click="activeCard(category)">
              {{ category.name }}
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Ristoranti -->
    <div class="container-lg pt-5">
      <h1 class="restaurant-title mb-5">Recomended restaurant</h1>
      <div class="row flex-wrap">
        <RestaurantCard v-for="restaurant in restaurants" :key="restaurant.id" :restaurant="restaurant"/>
      </div>
    </div>

    <!-- Banner info -->
    <div class="container-lg pt-5">
      <h1 class="restaurant-title mb-5">Recomended restaurant</h1>
      <div class="row flex-wrap">
        <RestaurantCard v-for="restaurant in restaurants" :key="restaurant.id" :restaurant="restaurant"/>
      </div>
    </div>

  </div>
</template>

<script>
import axios from "axios";
import RestaurantCard from "../components/RestaurantCard.vue";

export default {
  components: {
    RestaurantCard,
  },
  data: function () {
    return {
      categories: [],
      currentActive: "",
      isClicked: false,
      idCategory: null,
      restaurants: [],
      controlFilter: -1,
    };
  },
  methods: {
    //! funzione per effettuare la chiamata
    ApiCallAllCategories() {
      axios
        .get("/api/category")
        .then((result) => {
          this.categories = result.data.results;
          console.log(this.categories);
        })
        .catch((error) => {
          console.error(error);
        });
    },
    activeCard(category) {
      if (document.querySelector(".active-card") != null) {
        document.querySelector(".active-card").classList.remove("active-card");
      }
      this.idCategory = category.id;
      this.currentActive = document
        .getElementById("categoria" + this.idCategory)
        .classList.add("active-card");

      console.log(this.idCategory);
    },

    getRestaurants() {
      axios
        .get(`/api/restaurant`)
        .then((response) => {
          console.log(response.data.results.data);
          this.restaurants = response.data.results.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },

    filterRestaurants(id) {
      if (this.controlFilter == id) {
        this.getRestaurants();
        this.controlFilter = -1;
      } else {
        axios
          .get(`/api/restaurant/filter/${id}`)
          .then((response) => {
            console.log(response.data.results.data);
            this.restaurants = response.data.results.data;
          })
          .catch((error) => {
            console.error(error);
          });
        this.controlFilter = id;
      }
    },
  },
  created() {
    this.ApiCallAllCategories();
    this.getRestaurants();
  },
};
</script>

<style scoped lang="scss">
@import "../../sass/variables";

.order-card {
  width: 90%;
  height: 100px;
  font-family: "Poppins", sans-serif;
  font-weight: 600;
  color: $secondaryColor;
  cursor: pointer;
}

.active-card {
  background-color: $primaryColor;
  color: white;
}

.slider {
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
.container-jumbo {
  width: 100%;
  height: 700px;
  background-image: url("../../images/jumbotron.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: bottom;
}

.big-title {
  position: absolute;
  top: 80px;
  font-size: 3.5rem;
  line-height: 4.8rem;
  font-weight: 500;

  span {
    color: $primaryColor;
    font-family: "Syncopate", sans-serif;
    font-weight: 800;
  }
}

.restaurant-title{
  font-size: 3rem;
  font-weight: 800;
  text-align: center;
}

</style>