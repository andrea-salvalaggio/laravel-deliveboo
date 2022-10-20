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
    <div class="container-fluid slider mt-3">
      <div class="row flex-nowrap ">
        <div class="col-6 col-lg-2 my-3" v-for="(category, index) in categories" :key="index">
          <div
            class="mx-auto  my-rounded my-shadow order-card d-flex align-items-center justify-content-center text-capitalize"
            :id="'categoria'+category.id" @click="activeCard(index), filterRestaurants(category.id)">
            {{ category.name }}
          </div>
        </div>
      </div>
    </div>

    <!-- Ristoranti -->
    <div class="container-lg pt-5">
      <h1 class="restaurant-title mb-5">Recomended restaurant</h1>
      <div class="row flex-wrap mb-5">
        <RestaurantCard
          v-for="restaurant in restaurants"
          :key="restaurant.id"
          :restaurant="restaurant"
        />
      </div>
    </div>

    <!-- Banner info -->
    <div
      class="container-lg d-none d-lg-block info-container my-rounded my-shadow"
    >
      <div class="overlay my-rounded"></div>
      <div class="col-12 cta-container d-flex flex-column align-items-center">
        <h2 class="text-white cta-title">Do you have a restaurant?</h2>
        <h3 class="text-white font-weight-lighter mb-5">
          Find out all the advantages of home delivery
        </h3>
        <div
          class="
            nav-item
            my-btn
            rounded-pill
            py-1
            px-4
            my-btn-shadow
            mt-md-0
            text-center
          "
        >
          <a href="/register" class="nav-link text-white px-0">Sign up</a>
        </div>
      </div>
    </div>

    <!-- Loghi brand -->
    <div class="container-lg">
      <h1 class="restaurant-title mb-5">Popular restaurant</h1>
      <div class="row flex-row justify-content-between">
        <div
          class="
            col-2
            brand-container
            d-flex
            justify-content-center
            align-items-center
            my-rounded my-shadow
          "
        >
          <img src="../../images/mc-logo.png" alt="Logo McDonald's" />
        </div>
        <div class="col-2 brand-container">Logo 2</div>
        <div class="col-2 brand-container">Logo 3</div>
        <div class="col-2 brand-container">Logo 4</div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import RestaurantCard from '../components/RestaurantCard.vue';

export default {
  components: {
    RestaurantCard
  },
  data: function () {
    return {
      categories: [],
      categoryIndex: [],
      currentActive: '',
      isClicked: false,
      idCategory: null,
      restaurants: [],
      controlFilter: -1
    }
  },
  methods: {
    //! funzione per effettuare la chiamata
    ApiCallAllCategories() {
      axios.get('/api/category')
        .then((result) => {
          this.categories = result.data.results
          let i = 0
          this.categories.forEach(element => {
            this.categoryIndex[i] = false
            i++;
          });
          console.log(this.categoryIndex)
        })
        .catch((error) => {
          console.error(error)
        })
    },
    activeCard(index) {
      // if (document.querySelector('.active-card') != null) {
      //   document.querySelector('.active-card').classList.remove('active-card')
      // }
      // this.idCategory = category.id
      // this.currentActive = document.getElementById('categoria' + this.idCategory).classList.add('active-card')

      // console.log(this.idCategory)

    },

    getRestaurants() {
      axios.get(`/api/restaurant`)
        .then((response) => {
          console.log(response.data.results.data);
          this.restaurants = response.data.results.data;
        }).catch((error) => {
          console.error(error)
        });
    },

    filterRestaurants(id) {
      if (this.controlFilter == id) {
        this.getRestaurants();
        this.controlFilter = -1
      } else {
        axios.get(`/api/restaurant/filter/${id}`)
          .then((response) => {
            console.log(response.data.results.data);
            this.restaurants = response.data.results.data;
          }).catch((error) => {
            console.error(error)
          })
        this.controlFilter = id
      }


    }
  },
  created() {
    this.ApiCallAllCategories();
    this.getRestaurants()
  }
}
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

.info-container {
  width: 100%;
  height: 450px;
  background-image: url("../../images/delivery-info.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: bottom;
  margin-top: 200px;
  margin-bottom: 200px;
  position: relative;
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

.restaurant-title {
  font-size: 3rem;
  font-weight: 800;
  text-align: center;
}

.overlay {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  z-index: 1;
  background-color: black;
  opacity: 0.3;
}

.cta-container {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 2;
}

.cta-title {
  font-size: 3.7rem;
  font-weight: 800;
}

.brand-container {
  width: calc(100% / 3 - 40px);
  height: 120px;
  margin: 0 20px;

  img {
    width: 50%;
  }
}
</style>