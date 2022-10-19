<template>
    <div class="col-6 col-md-4 my-3">
        <div class="card-container bg-white my-rounded my-shadow">
            <div class="img-container">
                <img class="my-rounded" :src="checkUrl(restaurant.restaurantPic)" :alt="restaurant.name">
            </div>
        </div>
    </div>
<!--  @if (filter_var($restaurants->restaurantPic, FILTER_VALIDATE_URL))
        <img src="{{ $restaurants->restaurantPic }}" alt="{{ $restaurants->name }} photo" class="rounded-5">
        @else
        <img src="{{ asset('storage/' . $restaurants->restaurantPic) }}" alt="{{ $restaurants->name }} photo"
            class="rounded-5">
@endif -->
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

    .img-container {
        height: 174px;
        width: 100%;
        img {
            width: 100%;
            height: 174px;
            object-fit: cover;
        }
    }
}
</style>