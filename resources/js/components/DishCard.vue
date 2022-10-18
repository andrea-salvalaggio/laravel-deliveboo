<template>
    <div class="col-4">
        <div class="dish-card d-flex align-items-end flex-wrap">
        <div class="col-12 img-container">
            <img class="img-fluid image" :src="dish.dishPic" :alt="dish.name">
        </div>

        <div class="text-left font-weight-bold col-12 text-capitalize">
            {{ dish.name }}
        </div>

        <div class="text-left font-weight-bold col-12 text-capitalize">
            <span class="euro">€ </span>{{ dish.price }}
        </div>
        </div>
    </div>
    
</template>

<script>
export default {
    props: {
        dish: {
            type: Object,
            required: true,
        },
    },
}
</script>

<style lang="scss" scoped>
@import '../../sass/variables';

.dish-card {
    background-color: white;
    border-radius: 30px;
    width: 98%;
}

.euro {
    color: $primaryColor;
}

.img-container{
    height: 200px;
    .image{
        object-fit: contain;
    }
}
</style>