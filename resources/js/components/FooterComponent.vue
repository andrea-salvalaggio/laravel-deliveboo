<template>
  <footer class="p-5">
    <div class="container-lg">
      <div class="row my-5">
        <!-- Colonna logo -->
        <div class="col-3 mt-5">
          <!-- Logo AL MOMENTO PLACEHOLDER -->
          <img
            src="https://media.discordapp.net/attachments/1027584701415833620/1032191239577153586/deliveboo-logo-invert-desktop.png"
            alt="logo"
          />
        </div>

        <!-- Colonna join us -->
        <div class="col-3">
          <!-- Links -->
          <h5 class="text-uppercase font-weight-bold h4">join us</h5>
          <ul class="list-unstyled">
            <li class="mt-3">
              <a href="#!">Careers</a>
            </li>
            <li class="mt-2">
              <a href="#!">Restaurants</a>
            </li>
            <li class="mt-2">
              <a href="#!">Become a Courier</a>
            </li>
            <li class="mt-2">
              <a href="#!">About</a>
            </li>
          </ul>
        </div>

        <!-- Colonna Let us help you -->
        <div class="col-3">
          <!-- Links -->
          <h5 class="text-uppercase font-weight-bold h4">let us help you</h5>

          <ul class="list-unstyled">
            <li class="mt-3">
              <a href="#!">Help Center</a>
            </li>
            <li class="mt-2">
              <a href="#!">Support</a>
            </li>
            <li class="mt-2">
              <a href="#!">Contacts</a>
            </li>
          </ul>
        </div>

        <!-- Colonna Follow us -->
        <div class="col-3">
          <!-- Links 3 -->
          <h5 class="text-uppercase font-weight-bold h4">follow us</h5>

          <ul class="list-unstyled">
            <li class="mt-3">
              <a href="#!">Facebook</a>
            </li>
            <li class="mt-2">
              <a href="#!">Twitter</a>
            </li>
            <li class="mt-2">
              <a href="#!">Instagram</a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Divisore -->
      <div class="col-12 divisor"></div>

      <!-- Copyright -->
      <div class="copyright-container d-flex justify-content-between my-4">
        <div class="footer-copyright mt-4">
          <p>© All right reserved Made &#129505; by Team 4 - Class #67</p>
        </div>
        <div class="footer-copyright-links mt-4">
          <p>
            <a class="mx-2" href="#!">Privacy Policy</a> |
            <a class="mx-2" href="#!">Terms & condition</a> |
            <a class="mx-2" href="#!">Cookies Policy</a>
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
}

.divisor {
  border-bottom: 1px solid white;
}

a {
  color: $secondaryColor;
  font-weight: 300;
}

li,
p,
h5 {
  color: white;
}

.copyright-container {
  p {
    font-size: 0.7rem;
  }
}
</style>
