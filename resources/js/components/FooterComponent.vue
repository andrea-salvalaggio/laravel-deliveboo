<template>
  <footer class="p-5">
    <div class="container-lg">
      <div class="row justify-content-between">

        <!-- Colonna logo -->
        <div class="col-3 mt-5 img-container">

          <!-- Logo AL MOMENTO PLACEHOLDER -->
          <img src="https://cdn.discordapp.com/attachments/1027584701415833620/1032191240126611536/deliveboo-logo-invert-mobile.png" alt="logo" class="d-lg-none" />
          <img src="https://media.discordapp.net/attachments/1027584701415833620/1032191239577153586/deliveboo-logo-invert-desktop.png" alt="logo" 
          class="d-none d-lg-block" />
        </div>

        <!-- Colonna join us -->
        <div class="col-6 col-md-3 mb-5">
          <!-- Links -->
          <h5 class="text-uppercase font-weight-bold h4">join us</h5>
          <ul class="list-unstyled">
            <li class="my-2">
              <a href="#!">Careers</a>
            </li>
            <li class="my-2">
              <a href="#!">Restaurants</a>
            </li>
            <li class="my-2">
              <a href="#!">Become a Courier</a>
            </li>
            <li class="my-2">
              <a href="#!">About</a>
            </li>
          </ul>
        </div>

        <!-- Colonna Let us help you -->
        <div class="col-6 col-md-3 mb-5">
          <!-- Links -->
          <h5 class="text-uppercase font-weight-bold h4">let us help you</h5>

          <ul class="list-unstyled">
            <li class="my-2">
              <a href="#!">Help Center</a>
            </li>
            <li class="my-2">
              <a href="#!">Support</a>
            </li>
            <li class="my-2">
              <a href="#!">Contacts</a>
            </li>
          </ul>
        </div>

        <!-- Colonna Follow us -->
        <div class="col-6 col-md-3 mb-5">
          <!-- Links 3 -->
          <h5 class="text-uppercase font-weight-bold h4">follow us</h5>

          <ul class="list-unstyled">
            <li class="my-2">
              <a href="#!">Facebook</a>
            </li>
            <li class="my-2">
              <a href="#!">Twitter</a>
            </li>
            <li class="my-2">
              <a href="#!">Instagram</a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Divisore -->
      <div class="col-12 divisor"></div>

      <!-- Copyright -->
      <div class="copyright-container d-flex justify-content-between mt-4">
        <div class="footer-copyright">
        <p>© All right reserved Made &#129505; by Team 4 - Class #67</p>
      </div>
      <div class="footer-copyright-links">
        <p>
            <a class="mx-2" href="#!">Privacy Policy</a> | <a class="mx-2" href="#!">Terms & condition</a> | <a class="mx-2" href="#!">Cookies Policy</a>
        </p>
      </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {};
</script>

<style lang='scss' scoped>
@import "../../sass/variables";

footer {
  background-color: $footerColor;

  .img-container{
    img{
      width: 100%;
    }
    .d-lg-none{
      max-width: 72px;
      min-width: 72px;
    }
  }
}

.divisor {
  border-bottom: 1px solid white;
}

a {
  color: $secondaryColor;
}

li,
p,
h5 {
  color: white;
}

.copyright-container {
  p{
    font-size: 0.7rem;
  }
}
</style>
