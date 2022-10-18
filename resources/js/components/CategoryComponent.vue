<template>
  <div class="col-3 my-4">
    <div class="mx-auto bg-white my-rounded my-shadow order-card d-flex align-items-center justify-content-center">
        {{ category.name }}
    </div>
  </div>
</template>

<script>
export default {
    props:{
        category: Object,
    }
}
</script>

<style scoped lang="scss">
    .order-card{
        width: 90%;
        height: 100px;
    }
</style>