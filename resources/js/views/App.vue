<template>
  <div>
    <HeaderComponent />
    <main>
      <router-view></router-view>
    </main>
  </div>
</template>

<script>
import HeaderComponent from '../components/HeaderComponent.vue'
export default {
  components:{
    HeaderComponent,
  }
}
</script>

<style scoped>
main{
  padding-top: 103px;
}
</style>