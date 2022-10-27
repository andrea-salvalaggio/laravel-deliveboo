<template>
    <section class="position-relative">
        <!-- jumbo -->
        <div class="jumbo">
            <img :src="checkUrl(restaurant.restaurantPic)" :alt="restaurant.name + 'photo'" />
        </div>
        <!-- restaurant name -->
        <div class="container-lg py-4">
            <h1 class="text-center my-4">
                {{ restaurant.name }}
            </h1>
            <div class="col-12 d-flex justify-content-center flex-wrap">
                <p class="mx-4 my-1"><span><i class="fa-solid fa-location-dot"></i></span> &nbsp;{{ restaurant.address }}</p>
                <p class="my-1"><span><i class="fa-sharp fa-solid fa-clock"></i></span> &nbsp;{{restaurant.open.slice(0, 5)}} – {{restaurant.close.slice(0, 5)}}</p>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Menu -->
                <div class="col-lg-8 col-12">
                    <div class="menu-container m-0 my-rounded py-4 px-lg-5">
                        <h3 class="text-capitalize border-bottom py-4 m-0">menu</h3>
                        <div class="row mt-5 mx-auto">
                            <div class="col-12 col-md-6 col-lg-4 mb-4 mt-0" v-for="dish in restaurant.dishes" :key="dish.id">
                                <div class=" dish-card row align-items-end flex-wrap mx-auto my-shadow">
                                    <div class="col-12 img-container" :class="dish.visible == 1 ? 'grey-filter' : ''">
                                        <img class="img-fluid image" :src="checkUrl(dish.dishPic)" :alt="dish.name" />
                                    </div>
                                    <div class="col-12 pt-3">
                                        <div v-if="dish.visible==0" class="badge my-badge-success badge-pill w-25 mb-3 py-1"><small>available</small>
                                        </div>
                                        <div v-else class="badge my-badge-danger badge-pill mb-3 py-1"><small>not available</small></div>
                                    </div>
                                    <div class="col-12 w-100" :class="dish.visible == 1 ? 'grey-filter' : ''">
                                        <div>
                                            <h4 class="text-left font-weight-bold col-12 text-capitalize p-0">
                                                {{ dish.name }}
                                            </h4>

                                            <p class="p-0 overflo-auto description-container hide-scrollbar slider"> {{ dish.description }}</p>
                                            <hr>
                                        </div>

                                        <div class="col-12 d-flex justify-content-between align-items-center mb-3 p-0">
                                            <h4 class="text-left font-weight-bold text-capitalize p-0">
                                                <span class="euro">€ </span>{{ dish.price }}
                                            </h4>
                                            <div class="add-button-container" @click="insertToCart(dish), getTotal()"
                                            :class="dish.visible == 1 ? 'd-none' : ''">
                                            <div class="add-button">+</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carrello  lg-->
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="menu-container m-0 my-rounded py-4 px-lg-5 mx-auto">
                        <div class="row border-bottom align-items-center">
                            <div class="col-8">
                                <h3 class="text-capitalize py-4 m-0">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    cart
                                </h3>
                            </div>
                            <div class="col-4 scale-in-center" v-if="newCart.length>0">
                                <button class="btn btn-danger rounded-pill" @click="clearCart()" id="clear">
                                    Clear Cart
                                </button>
                            </div>
                        </div>
                        <div class="row bg-white my-shadow my-rounded mt-5">
                            <div class="col-12 p-5">
                                <!-- Piatti ordinati -->
                                <div class="row cart">
                                    <div class="col-12 restaurant-in-cart">
                                        <h3>Your Order :</h3>
                                    </div>
                                    <div class="col-12" v-if="newCart.length>0">
                                        <div class="row border-bottom py-2" v-for="(cartItem, index) in newCart"
                                            :key="index">
                                            <div class="col-5 text-capitalize">
                                                {{ cartItem.name }}
                                            </div>
                                            <div class="col-1 p-0 text-center icon-in-cart"
                                                @click="subtractionDish(cartItem, index)">
                                                <i class="fa-solid fa-minus"></i>
                                            </div>
                                            <div class="col-1 p-0 text-center">
                                                x{{ cartItem.quantity }}
                                            </div>
                                            <div class="col-1 p-0 text-center icon-in-cart" @click="moreDish(cartItem)">
                                                <i class="fa-solid fa-plus"></i>
                                            </div>
                                            <div class="col-3 text-center">€ {{ cartItem.price*cartItem.quantity }}</div>
                                            <div class="col-1 trash icon-trash text-danger" @click="deleteSingleDish(index)">
                                                <i class="fa-solid fa-trash-can text-danger"></i>
                                            </div> 
                                        </div>
                                    </div>

                                    <!-- Placeholder carello -->
                                    <div class="col-12 scale-in-center" v-else>
                                        <div class="placeholder-container">
                                            <img src="../../images/cart-placeholder.jpg" alt="Your Cart is Empty">
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-4">
                                    <div class="col-8 text-capitalize">total:</div>
                                    <div class="col-4">€{{ getTotal() }}</div>
                                </div>
                                <!-- form -->
                                <div class="row form-group w-100 ">
                                    <form action="" method="" class="w-100 scale-in-center" @submit.prevent v-if="newCart.length != 0">
                                        <div class="col-12 py-3">
                                            <h5>Your info :</h5>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text"
                                                class="border-0 my-rounded bg-light w-100 px-4 py-2 form-control"
                                                placeholder="Name*" required v-model="orderName" minlength="2" maxlength="25">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text"
                                                class="border-0 my-rounded bg-light w-100 px-4 py-2 form-control"
                                                placeholder="Surname*" required v-model="orderSurname" minlength="2" maxlength="10">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text"
                                                class="border-0 my-rounded bg-light w-100 px-4 py-2 form-control"
                                                placeholder="Address*" required v-model="orderAddress" minlength="10" maxlength="40">
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control border-0 px-4 font-weight-lighter"
                                                placeholder="Add some comment, it will help us with the delivery"
                                                name="description" rows="3" v-model="orderComment"></textarea>
                                        </div>
                                        <div class="col-12 position-relative">    
                                            <v-braintree 
                                                authorization="sandbox_mfpgm8gp_j6kyrc5ff9wmsngg"
                                                locale="it_IT"
                                                btnText="Checkout"
                                                @success="onSuccess"
                                                @error="onError"
                                            class="mx-auto">
                                            </v-braintree>
                                            <input type="submit" value="Checkout" class="btn btn-primary trick-btn" :class="orderName != '' && orderSurname != '' && orderAddress != '' ? 'd-none' : ''">
                                        </div>
                                    </form>
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Carrello smartphone -->
        <div class="icon-cart-smartphone d-lg-none d-flex align-items-center justify-content-center"
            @click="changeStatus()">
            <i class="fa-solid fa-cart-shopping"></i>
        </div>
        <div class="notification d-lg-none" v-if="newCart.length>0"></div>
        <div class="cart-smartphone my-rounded slide-in-bottom" :class="showCart ? 'd-block' : 'd-none'">
            <div class="menu-container my-rounded mx-auto">
                <div class="row bg-white my-shadow my-rounded">
                    <div class="col-12 p-3">
                        <!-- Piatti ordinati -->
                        <div class="row cart align-items-center">
                            <div class="col-8 restaurant-in-cart">
                                <h3>Your Order :</h3>
                            </div>
                            <div class="col-4" v-if="newCart.length>0">
                                <button class="btn btn-danger rounded-pill" @click="clearCart()" id="clear">
                                    Clear
                                </button>
                            </div>
                            <div class="col-12" v-if="newCart.length>0">
                                <div class="row border-bottom py-2" v-for="(cartItem, index) in newCart" :key="index">
                                    <div class="col-5 text-capitalize">
                                        {{ cartItem.name }}
                                    </div>
                                    <div class="col-1 p-0 text-center icon-in-cart"
                                        @click="subtractionDish(cartItem, index)">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <div class="col-1 p-0 text-center">
                                        x{{ cartItem.quantity }}
                                    </div>
                                    <div class="col-1 p-0 text-center icon-in-cart" @click="moreDish(cartItem)">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                    <div class="col-3 text-center">€ {{ roundFunctionOnTotal(cartItem.price, cartItem.quantity) }}</div>
                                    <div class="col-1 trash icon-trash text-danger px-0" @click="deleteSingleDish(index)">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Placeholder carello -->
                            <div class="col-12 scale-in-center" v-else>
                                <div class="placeholder-container">
                                    <img src="../../images/cart-placeholder.jpg" alt="Your Cart is Empty">
                                </div>
                            </div>
                        </div>
                        <div class="row py-4">
                            <div class="col-8 text-capitalize">total:</div>
                            <div class="col-4">€{{ getTotal() }}</div>
                        </div>
                        <!-- form -->
                        <div class="row form-group w-100 " v-if="newCart.length != 0" >
                            <form action="" method="" class="w-100" @submit.prevent>
                                <div class="col-12 py-3">
                                    <h5>Your info :</h5>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text"
                                        class="border-0 my-rounded bg-light w-100 px-4 py-2 form-control"
                                        placeholder="Name*" required v-model="orderName" minlength="2" maxlength="25">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text"
                                        class="border-0 my-rounded bg-light w-100 px-4 py-2 form-control"
                                        placeholder="Surname*" required v-model="orderSurname" minlength="2" maxlength="10">
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text"
                                        class="border-0 my-rounded bg-light w-100 px-4 py-2 form-control"
                                        placeholder="Address*" required v-model="orderAddress" minlength="6" maxlength="40">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0 px-4 font-weight-lighter"
                                        placeholder="Add some comment, it will help us with the delivery"
                                        name="description" rows="3" v-model="orderComment"></textarea>
                                </div>
                                <div class="col-12 position-relative">
                                <v-braintree
                                            authorization="sandbox_mfpgm8gp_j6kyrc5ff9wmsngg"
                                            locale="it_IT"
                                            btnText="Checkout"
                                            @success="onSuccess"
                                            @error="onError"
                                        class="ml-4"></v-braintree>
                                        <input type="submit" value="Checkout" class="btn btn-primary trick-btn-mobile" :class="orderName.length>=2 && orderSurname.length>=2 && orderAddress.length>=6 ? 'd-none' : ''">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import axios from "axios";

    export default {
        data: function () {
            return {
                restaurant: {},
                newCart: [],
                showCart: false,
                showNotification: false,
                counter:0,

                orderName: '',
                orderSurname: '',
                orderComment: '',
                orderAddress: '',
                orderJson: {}
            };
        },
        methods: {
            getRestaurant() {
                axios
                    .get(`http://127.0.0.1:8000/api/restaurant/${this.$route.params.id}`)
                    .then((response) => {
                        this.restaurant = response.data.results;
                        this.length = this.cart.length;
                    })
                    .catch((error) => {
                        console.warn(error);
                    });
            },
            //! clear del carrello
            clearCart() {
                //!popup per la conferma della cancellazione
                console.log(this.orderJson)
                if (this.newCart != null && this.newCart.length > 0) {
                    Vue.swal({
                        title: "Are you sure?",
                        showDenyButton: true,
                        confirmButtonText: "Yes",
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            this.newCart = [];
                            localStorage.clear();
                        }
                    });
                } else {
                    Vue.swal("No item in cart");
                }
            },

            //! funzione che cancella il singolo piatto del carrello
            deleteSingleDish(id) {
                this.newCart.splice(id, 1)
                this.setInCart()
            },

            //! funzione che controlla il path delle immagini se sono link o immagini caricate
            checkUrl(img) {
                if (img.includes("http")) {
                    return img;
                } else {
                    return "/storage/" + img;
                }
            },

            //! funzione per inviare l'ordine al backoffice
            sendOrder() {
                this.orderJson = {
                    'name': this.orderName,
                    'surname': this.orderSurname,
                    'address': this.orderAddress,
                    'comment': this.orderComment,
                    'total': this.getTotal(),
                    'restaurant_id': this.$route.params.id
                }
                axios.post(`http://127.0.0.1:8000/api/storeOrder`, {
                    data: [this.newCart, this.orderJson]
                }).then((response) => {
                    console.warn(response)
                }).catch((error) => {
                    console.error(error)
                })
            },

            getCurrentID(dish) {
                return this.newCart.findIndex((element) => element.id == dish.id)
            },

            // una volta ottenuto l'id dobbiamo caricare il singolo piatto
            insertToCart(dish) {
                dish.quantity = 1
                let currentIndex = this.getCurrentID(dish)
                if (this.newCart.length > 0) {
                    if (this.checkOnUrl()) {
                        Vue.swal({
                            title: 'You can order from only one restaurant, are you sure to clear the cart?',
                            showCancelButton: true,
                            confirmButtonText: 'Yes',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.newCart = [];
                                localStorage.clear();
                                this.newCart.push({
                                    quantity: 1,
                                    ...dish
                                })
                                this.setInCart()
                               
                            }
                        })
                    } else if (currentIndex >= 0) {
                        if(this.newCart[currentIndex].quantity==25){
                            Vue.swal('25 maybe is too much')
                        }
                        else{
                            this.newCart[currentIndex].quantity++
                        }
                    } else {
                        this.newCart.push({
                            quantity: 1,
                            ...dish
                        })
                    }
                } else {

                    this.newCart.push({
                        quantity: 1,
                        ...dish
                    })
                }
                this.setInCart()
            },
            getLocalStorage() {
                if (JSON.parse(localStorage.getItem("newCart")) == null) {
                    console.log('ciao')
                } else {
                    this.newCart = JSON.parse(localStorage.getItem("newCart"));
                }
            },
            setInCart() {
                localStorage.setItem("newCart", JSON.stringify(this.newCart));
            },
            checkOnUrl() {
                if (this.newCart[0].restaurant_id != this.$route.params.id) {
                    return true
                } else {
                    return false
                }
            },
            getTotal() {
                let total = this.newCart.reduce((acc, item) => acc + item.price * item.quantity, 0)
                total = Math.round(total * 100) / 100
                return total
            },
            moreDish(dish) {
                dish.quantity++
                console.log('la quantita e' + dish.quantity)
                if (dish.quantity > 25) {
                    Vue.swal('25 maybe is too much')
                    dish.quantity--
                } else {
                    localStorage.setItem("cart", JSON.stringify(this.cart));
                }
            },
            subtractionDish(dish, id) {
                dish.quantity--
                if (dish.quantity == 0) {
                    this.deleteSingleDish(id)
                }
            },

            // cambiera' lo status di una variabile booleana per far mostrare al click il carrello (smartphone)
            changeStatus() {
                this.showCart = !this.showCart
            },

            onSuccess (payload) {
                
                let nonce = payload.nonce;
                Vue.swal('Success, the restaurant will receive the order soon')
                this.sendOrder()
                setTimeout(()=>{
                    this.newCart= []
                    this.setInCart()
                },2000)
                this.orderName = ''
                this.orderSurname = ''
                this.orderAddress = ''
                this.orderComment  = ''
                
                // Do something great with the nonce...
            },
            onError (error) {
                let message = error.message;
                // Whoops, an error has occured while trying to get the nonce
            },
            roundFunctionOnTotal(item, qt){
                let total = item * qt
                total = Math.round(total * 100) / 100
                return total
            },
            
        },
        created() {
            this.getRestaurant();
            this.getLocalStorage();

        },
    };
</script>

<style lang="scss" scoped>
    @import "../../sass/variables";

    .jumbo {
        height: 400px;
        width: 100%;

        img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
    }

    .container-lg {
        h1 {
            font-weight: 600;
        }
    }

    .menu-container {
        width: 95%;

        h3 {
            font-size: 2rem;
            font-weight: 600;
            color: $secondaryColor;
        }
    }

    .cart {
        height: 300px;
        overflow-y: scroll;

        &:hover::-webkit-scrollbar-thumb {
            background-color: $primaryColor;
            border-radius: 10px;
        }

        &::-webkit-scrollbar {
            width: 10px;
            height: 8px;
        }

        /* Handle */
        &::-webkit-scrollbar-thumb {
            background: $primaryColor;
            border-radius: 5px;
        }

        .icon-in-cart {
            cursor: pointer;
            transition: 0.2s ease-in-out;

            &:hover {
                color: $primaryColor;
            }
        }

        .icon-trash {
            cursor: pointer;
            transition: 0.2s ease-in-out;

            &:hover {
                color: red;
            }
        }
    }

    .dish-card {
        background-color: white;
        border-radius: 30px;
        width: 98%;
        height: 510px;
    }

    .description-container{
        max-height: 50px;
        overflow-y: scroll;
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
            width: 100%;
        }
    }

    .add-button-container {
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

    .trash {
        cursor: pointer;
    }

    .grey-filter {
        filter: grayscale(100%);
        opacity: 0.5;
    }

    .form-container {
        input {
            border: none;
        }
    }

    .icon-cart-smartphone {
        position: fixed;
        z-index: 3;
        bottom: 30px;
        right: calc(50% - 25px);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: $primaryColor;
        color: white;
        cursor: pointer;
        box-shadow: 1px 4px 10px rgba(0, 0, 0, 0.2);

    }

    .cart-smartphone {
        position: fixed;
        z-index: 3;
        left: calc(50% - 45%);
        bottom: 95px;
        width: 90%;
        background: white;
        max-height: 700px;
        overflow-x: hidden;
        overflow-y: scroll;
        border: 1px solid #999999;
    }
    .notification{
        position: fixed;
        z-index: 4;
        bottom: 65px;
        left: calc(50% + 7px);
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: red;
    }


    //animazione carrello
    .slide-in-bottom {
	-webkit-animation: slide-in-bottom 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    animation: slide-in-bottom 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    @-webkit-keyframes slide-in-bottom {
        0% {
            -webkit-transform: translateY(1000px);
                    transform: translateY(1000px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            opacity: 1;
        }
    }
    @keyframes slide-in-bottom {
        0% {
            -webkit-transform: translateY(1000px);
                    transform: translateY(1000px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            opacity: 1;
        }
    }

    .scale-in-center {
	-webkit-animation: scale-in-center 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	animation: scale-in-center 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    @-webkit-keyframes scale-in-center {
        0% {
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 1;
        }
        100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1;
        }
    }
    @keyframes scale-in-center {
        0% {
            -webkit-transform: scale(0);
            transform: scale(0);
            opacity: 1;
        }
        100% {
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1;
        }
    }
    
    .placeholder-container{
        width: 60%;
        min-width: 70px;
        margin: 0 auto;

        img{
            width: 100%;
        }
    }

    .slider {
    width: 100%;
    overflow-x: scroll;

    &:hover::-webkit-scrollbar-thumb {
        background-color: $primaryColor;
        border-radius: 10px;
    }

    &::-webkit-scrollbar {
        width: 10px;
        height: 8px;
    }
}

    .hide-scrollbar {
        overflow: auto;
        -ms-overflow-style: none;
        /* IE 11 */
        scrollbar-width: none;
        /* Firefox 64 */

        &:hover {
            scrollbar-width: auto;
        }
    }
    .trick-btn, .trick-btn-mobile{
        position: absolute;
        z-index: 2;
        bottom: 0;
    }
    .trick-btn{
        left: 15px;
    }
    .trick-btn-mobile{
        left: 39px;
    }
</style>