<template>
  <div class="box">
    <div class="pizza-slice slice-1">
    <div>
        <div class="crust"></div>
        <div class="cheese">
        <div class="peperoni p-1"></div>
        <div class="peperoni p-2"></div>
        </div>
    </div>
    </div>
    <div class="pizza-slice slice-2">
    <div>
        <div class="crust"></div>
        <div class="cheese">
        <div class="peperoni p-1"></div>
        <div class="peperoni p-2"></div>
        </div>
    </div>
    </div>
    <div class="pizza-slice slice-3">
    <div >
        <div class="crust"></div>
        <div class="cheese">
        <div class="peperoni p-1"></div>
        <div class="peperoni p-2"></div>
        </div>
    </div>
    </div>
    <div class="pizza-slice slice-4">
    <div>
        <div class="crust"></div>
        <div class="cheese">
        <div class="peperoni p-1"></div>
        <div class="peperoni p-2"></div>
        </div>
    </div>
    </div>
    <div class="pizza-slice slice-5">
    <div >
        <div class="crust"></div>
        <div class="cheese">
        <div class="peperoni p-1"></div>
        <div class="peperoni p-2"></div>
        </div>
    </div>
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style scoped>

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Raleway';
  background-color: transparent;
}

p {
  margin-top: 2vh;
  text-transform: capitalize;
  font-size: 20px;
  text-align: center;
  color: rgb(255, 113, 113);
  font-weight: 600;
  text-shadow: 1px 1px black;
}

.box {
  position: relative;
  width: 200px;
  height: 200px;
  display: block;
  margin: auto;
  margin-top: 15%;
  border-radius: 50%;
}

.pizza-slice {
  position: absolute;
  width: 65%;
  height: 50%;
  clip-path: polygon(50% 100%, 0 0, 100% 0);
  -webkit-clip-path: polygon(50% 100%, 0 0, 100% 0);
  transform: rotate(0deg);
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -ms-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  animation-duration: .7s;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

.slice-1 {
  top: 5%;
  left: 15%;
}

.slice-2 {
  top: 18%;
  left: 33%;
  opacity: 0;
  z-index: 2;
  transform: rotate(72deg);
  -webkit-transform: rotate(72deg);
  -moz-transform: rotate(72deg);
  -ms-transform: rotate(72deg);
  -o-transform: rotate(72deg);
  animation-name: slice;
}

.slice-3 {
  top: 39%;
  left: 27%;
  opacity: 0;
  animation-name: slice-2;
  transform: rotate(144deg);
  -webkit-transform: rotate(144deg);
  -moz-transform: rotate(144deg);
  -ms-transform: rotate(144deg);
  -o-transform: rotate(144deg);
}

.slice-4 {
  top: 38%;
  left: 5%;
  opacity: 0;
  transform: rotate(216deg);
  -webkit-transform: rotate(216deg);
  -moz-transform: rotate(216deg);
  -ms-transform: rotate(216deg);
  -o-transform: rotate(216deg);
  animation-name: slice-3;
}

.slice-5 {
  top: 17%;
  left: -3%;
  opacity: 0;
  transform: rotate(288deg);
  -webkit-transform: rotate(288deg);
  -moz-transform: rotate(288deg);
  -ms-transform: rotate(288deg);
  -o-transform: rotate(288deg);
  animation-name: slice-4;
}

.crust {
  position: absolute;
  top: 6%;
  left: 10%;
  width: 80%;
  height: 80%;
  background: #D19952;
  -webkit-clip-path: polygon(50% 100%, 0 0, 100% 0);
  clip-path: polygon(50% 100%, 0 0, 100% 0);
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
}

.cheese {
  position: absolute;
  top: 20%;
  left: 17.5%;
  width: 65%;
  height: 65%;
  background: #CB3234;
  -webkit-clip-path: polygon(50% 100%, 0 0, 100% 0);
  clip-path: polygon(50% 100%, 0 0, 100% 0);
  border-radius: 50%;
  overflow: hidden;
}
.peperoni{
  position: absolute;
  width: 25%;
  height: 30%;
  border-radius: 50%;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  background: #f4f4f4;
}

.p-1 {
  top: 10%;
  left: 35%;
}
.p-2 {
  top: 38%;
  right: 16%;
}

.p-3 {
  bottom: 10%;
  left: 26%;
}



@keyframes slice {
  0% {
    opacity: 0;
  }

  25% {
    opacity: 1;
  }

  100% {
    opacity: 1;
  }
}

@keyframes slice-2 {
  0% {
    opacity: 0;
  }

  25% {
    opacity: 0;
  }

  50% {
    opacity: 1;
  }

  100% {
    opacity: 1;
  }
}

@keyframes slice-3 {
  0% {
    opacity: 0;
  }

  50% {
    opacity: 0;
  }

  75% {
    opacity: 1;
  }

  100% {
    opacity: 1;
  }
}

@keyframes slice-4 {
  0% {
    opacity: 0;
  }

  75% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

@media all and (max-width:200px) {
  .box {
    width: 100px;
    height: 100px;
  }

  
  p {
    font-size: 1em;
  }
}



</style>