<template>
    <div class="col-4">
        <div class="dish-card d-flex align-items-end flex-wrap ">
            <div class="col-12 img-container">
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

                <div class="add-button-container mx-3 mb-3">
                    <div class="add-button">
                        +
                    </div>
                </div>
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
    methods:{
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
@import '../../sass/variables';

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