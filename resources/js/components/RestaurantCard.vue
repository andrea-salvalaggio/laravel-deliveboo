<template>
    <div class="col-12 col-md-6 col-lg-4 my-3">
        <a :href="'/HomeRestaurant/'+restaurant.id">
            <div class="card-container bg-white my-rounded my-shadow">
                <div class="img-container">
                    <img :src="checkUrl(restaurant.restaurantPic)" :alt="restaurant.name">
                </div>
                <h4 class="p-4">{{restaurant.name}}</h4>
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
</style>