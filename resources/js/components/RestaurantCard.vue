<template>
    <div class="col-6 col-md-4 my-3">
        <div class="card-container bg-white my-rounded my-shadow">
            <div class="img-container">
                <img class="my-rounded" :src="restaurant.restaurantPic" :alt="restaurant.name"></img>
            </div>
        </div>
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