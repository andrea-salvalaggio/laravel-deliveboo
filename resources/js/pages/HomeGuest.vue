<template>
    <div>
        <!-- banner -->
        <div class="container-jumbo d-lg-block">
            <!-- testo principale -->
            <div class="container-lg">
                <div class="row">
                    <div class="col-12 pl-4 col-md-5 title-container">
                        <h1 class="text-white big-title">
                            Restaurant <span>Food</span>, takeaway and groceries
                            <span>Delivered</span>.
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- categorie -->
        <div class="container-fluid border-bottom">
            <div class="container-lg my-5 slider slider-category hide-scrollbar">
                <div class="row flex-nowrap">
                    <div class="col-6 col-lg-2" v-for="(category, index) in categories" :key="index">
                        <div class="mx-auto my-rounded order-card d-flex align-items-center justify-content-center text-capitalize"
                            :id="'categoria' + category.id"
                            @click="activeCard(index), filterRestaurants(category.id, index)"
                            :class="controllerClicked[index] == true ? 'active-card' : ' '">
                            <div class="d-flex flex-column align-items-center">
                                <i class="fa-solid category-icon" :class="category.icon"></i>
                                {{ category.name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ristoranti -->
        <div class="container-lg" v-if="isLoading == false">
            <h1 class="restaurant-title mb-5">Restaurants</h1>
            <div v-if="filteredRestaurants.length != 0" class="row flex-wrap my-4 p-2">
                <div v-for="(restaurant, index) in filteredRestaurants" :key="index"
                    class="col-12 col-md-6 col-lg-4 my-4">
                    <RestaurantCard :restaurant="restaurant" v-if="index < restaurantNumber" />
                </div>
                <div class="row w-100" v-if="filteredRestaurants.length > 6">
                    <div class="w-25 mx-auto" @click="showMore()" v-if="restaurantNumber < filteredRestaurants.length">
                        <div class="col-12 text-center">Show More</div>
                        <div class="col-12 text-center"><i class="fa-solid fa-chevron-down"></i></div>
                    </div>
                    <div class="w-25 mx-auto" @click="showLess()" v-else>
                        <div class="col-12 text-center">Show Less</div>
                        <div class="col-12 text-center"><i class="fa-solid fa-chevron-up"></i></div>
                    </div>
                </div>
            </div>
            <div v-else class="col-12 badge-not-available text-center">
                <h5 class="m-0"><i class="fa-solid fa-circle-xmark"></i>Restaurant not available</h5>
            </div>
        </div>

        <!-- loader -->
        <div class="container-lg" v-else>
            <LoaderComponent />
        </div>
        <!-- Banner info -->
        <div class="container-lg info-container mx-auto my-shadow">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center cta-container">
                    <h2 class="text-white cta-title text-center">Do you have a restaurant?</h2>
                    <h3 class="text-white font-weight-lighter text-center mb-4">
                        Find out all the advantages of home delivery
                    </h3>
                    <div class="nav-item my-btn rounded-pill py-1 px-4 my-btn-shadow mt-md-0 text-center">
                        <a href="/register" class="nav-link text-white px-0">Sign up</a>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        </div>

        <!-- Brands -->
        <div class="container-fluid">
            <h1 class="restaurant-title mb-2">Popular restaurants</h1>
            <div class="container-lg mt-5 slider slider-brand hide-scrollbar">
                <div class="row flex-nowrap justify-content-center mt-4 px-4">
                    <div class="col-6 col-md-3 col-lg-2 d-flex justify-content-center align-items-center"
                        v-for="(brand, index) in brands" :key="index">
                        <img :src="brand.image" :alt="brand.name" class="w-50">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import RestaurantCard from '../components/RestaurantCard.vue';
import LoaderComponent from '../components/LoaderComponent.vue';

export default {
    components: {
        RestaurantCard,
        LoaderComponent,
    },
    data: function () {
        return {
            categories: [],
            controllerClicked: [],
            filterId: [],
            currentActive: '',
            isClicked: false,
            idCategory: null,
            restaurants: [],
            filteredRestaurants: [],
            controlFilter: -1,
            isLoading: true,
            restaurantNumber: 6,
            brands:
                [
                    {
                        'name': 'Logo McDonald\'s',
                        'image': '../../images/mc-logo.png'
                    },
                    {
                        'name': 'Logo KFC',
                        'image': '../../images/kfc-logo.png'
                    },
                    {
                        'name': 'Logo Burger King',
                        'image': '../../images/bk-logo.png'
                    },
                    {
                        'name': 'Logo Domino\'s Pizza',
                        'image': '../../images/domino-logo.png'
                    },
                    {
                        'name': 'Logo Olive Garden',
                        'image': '../../images/olive-logo.png'
                    },
                    {
                        'name': 'Logo Taco Bell',
                        'image': '../../images/taco-bell-logo.png'
                    },
                    {
                        'name': 'Logo Qdoba',
                        'image': '../../images/qdoba-logo.png'
                    },
                    {
                        'name': 'Logo Wendy\'s',
                        'image': '../../images/wendy-logo.png'
                    },
                ]
        }
    },
    methods: {
        //! funzione per effettuare la chiamata
        ApiCallAllCategories() {
            axios.get('/api/category')
                .then((result) => {
                    this.categories = result.data.results
                    for (let index = 0; index < this.categories.length; index++) {
                        this.controllerClicked[index] = false
                    }
                })
                .catch((error) => {
                    console.error(error)
                });
        },
        activeCard(index) {
            if (this.controllerClicked[index] == false) {
                this.controllerClicked[index] = true
            } else {
                this.controllerClicked[index] = false
            }
        },

        getRestaurants() {
            this.isLoading = true
            axios.get(`/api/restaurant`)
                .then((response) => {
                    this.restaurants = response.data.results
                    this.filteredRestaurants = this.restaurants
                    console.log(this.filteredRestaurants)
                    this.isLoading = false
                }).catch((error) => {
                    console.error(error)
                })
        },

        getFilteredRestaurants() {
            this.isLoading = true
            this.restaurants.forEach(restaurant => {
                restaurant.categories.forEach(category => {
                    if (this.filterId.includes(category.id)) {
                        if (!this.filteredRestaurants.includes(restaurant)) {
                            this.filteredRestaurants.push(restaurant)
                        }
                    }
                })
            })
            this.isLoading = false
        },



        filterRestaurants(id, index) {
            if (this.controllerClicked[index] == false) {
                this.filterId.splice(this.filterId.indexOf(id), 1)
                if (this.filterId.length > 0) {
                    this.filteredRestaurants = []
                    this.getFilteredRestaurants();
                } else {
                    this.getRestaurants()
                    this.filteredRestaurants = this.restaurants
                }
            } else {
                this.filterId.push(id);
                this.filteredRestaurants = []
                this.getFilteredRestaurants()
            }
        },


        // Questa funzione serve per prendere i ristoranti 6 alla volta 
        showMore() {
            if (this.restaurantNumber < this.filteredRestaurants.length) {
                this.restaurantNumber += 6
            } else {
                this.restaurantNumber = 6
            }
        },
        showLess(){
            this.restaurantNumber = 6
            this.filterRestaurants = this.restaurants
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
    overflow-x: scroll;

    &:hover::-webkit-scrollbar-thumb {
        background-color: $primaryColor;
        border-radius: 10px;
    }

    &::-webkit-scrollbar {
        width: 10px;
        height: 8px;
    }
}

.slider-category {
    height: 120px;
}

.slider-brand {
    height: 220px;
}

.hide-scrollbar {
    overflow: auto;
    -ms-overflow-style: none;
    /* IE 11 */
    scrollbar-width: none;
    /* Firefox 64 */

    &:hover {
        scrollbar-width: auto;
    }
}

.container-jumbo {
    width: 100%;
    height: 700px;
    background-image: url("../../images/jumbotron.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: bottom;
    position: relative;
}

.info-container {
    width: 100%;
    height: 450px;
    background-image: url("../../images/delivery-info.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: bottom;
    position: relative;
    border-radius: 30px;
    margin-top: 100px;
    margin-bottom: 100px;
}

.big-title {
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
    margin-top: 50px;
}

.overlay {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    // z-index: 1;
    border-radius: 30px;
    background-color: black;
    opacity: 0.3;
}

.cta-container {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;

    h3 {
        font-size: 1.5rem;
    }
}

.cta-title {
    font-size: 3rem;
    font-weight: 800;
}

.title-container {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
}

.badge-not-available {
    background-color: #fdedee;
    padding: 30px;
    border-radius: 10px;

    h5 {
        color: #f04d62;
        font-weight: 400;
        line-height: 2rem;

        i {
            font-size: 1.8rem;
            padding-right: 15px;
            vertical-align: middle;
        }
    }
}

.category-icon {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

@media screen and (max-width: 600px) {
    .container-jumbo {
        width: 100%;
        height: 700px;
        background-image: url("../../images/jumbotron-mobile.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        position: relative;

        .big-title {
            font-size: 3rem;
            line-height: 4rem;
            font-weight: 500;

            span {
                color: $primaryColor;
                font-family: "Syncopate", sans-serif;
                font-weight: 800;
            }
        }
    }
}
</style>