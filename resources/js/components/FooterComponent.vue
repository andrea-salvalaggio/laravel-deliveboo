<template>
  <!-- Footer -->
  <footer class="page-footer font-small blue pt-4">
    <!-- Footer Links -->
    <div class="container-lg text-center text-md-left">
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-3 mt-3">
          <!-- Content -->
          <img src="" alt="" />
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-3 mb-3">
          <!-- Links -->
          <h5 class="text-uppercase">Join Us</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Careers</a>
            </li>
            <li>
              <a href="#!">Restaurants</a>
            </li>
            <li>
              <a href="#!">Become a Courier</a>
            </li>
            <li>
              <a href="#!">About</a>
            </li>
          </ul>
        </div>

        <!-- Grid column -->
        <div class="col-3 mb-3">
          <!-- Links -->
          <h5 class="text-uppercase">Let us help you</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Help Center</a>
            </li>
            <li>
              <a href="#!">Support</a>
            </li>
            <li>
              <a href="#!">Contacts</a>
            </li>
          </ul>
        </div>

        <!-- Grid column -->
        <div class="col-3 mb-3">
          <!-- Links 3 -->
          <h5 class="text-uppercase">Follow us</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">Facebook</a>
            </li>
            <li>
              <a href="#!">Twitter</a>
            </li>
            <li>
              <a href="#!">Instagram</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-12 divisor"></div>
      <!-- Copyright -->
      <div class="copyright-container d-flex justify-content-between">
        <div class="footer-copyright">
        <p>© All right reserved Made &#128155 by Team 4 - Class #67</p>
      </div>
      <div class="footer-copyright-links">
        <p>
            <a href="#!">Privacy Policy</a> | <a href="#!">Terms & condition</a> | <a href="#!">Cookies Policy</a>
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
}

li,
p,
h5 {
  color: white;
}

.footer-copyright {
  padding: 2rem, 0rem, 5rem, 0rem;
}
</style>
