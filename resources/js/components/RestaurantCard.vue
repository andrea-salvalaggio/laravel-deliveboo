<template>
    <div class="col-12 col-md-6 col-lg-4 my-4">
        <a :href="'/HomeRestaurant/'+restaurant.id">
            <div class="card-container bg-white my-rounded my-shadow  mx-auto">
                <div class="img-container">
                    <img :src="checkUrl(restaurant.restaurantPic)" :alt="restaurant.name">
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="p-4 m-0">{{restaurant.name}}</h4>
                    <div class="add-button-container mx-3 mr-4" @click="addToCart(dish)">
                        <div class="add-button"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data: function () {
        return {

        }
    },

    props: {
        restaurant: {
            type: Object,
            require: true
        }
    },
    methods: {
        checkUrl(img){
            console.log()
            if(img.includes('http')){
                return img
            }else{
              return '/storage/'+img
            }
        },
    }
}
</script>

<style lang="scss" scoped>
.card-container {
    width: 95%;
    cursor: pointer;
    .img-container {
        height: 174px;
        width: 100%;
        img {
            width: 100%;
            height: 174px;
            object-fit: cover;
            border-radius: 30px 30px 0 0;
        }
    }
    h4{
        font-weight: 600;
        font-size: 1.3rem;
    }
}
a{
    text-decoration: none;
    color: black;
}

.add-button-container{
    background-color: green;
    color: white;
    font-size: 25px;
    border-radius: 50%;
    height: 40px;
    width: 40px;
    text-align: center;
    cursor: pointer;

    i{
        font-size: 1.2rem;
    }
}

</style>