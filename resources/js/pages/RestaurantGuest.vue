<template>
    <section>
        <!-- jumbo -->
        <div class="jumbo">
            <img :src="restaurant.restaurantPic" :alt="restaurant.name + 'photo'" />
        </div>
        <!-- restaurant name -->
        <div class="container-lg py-4">
            <h1 class="text-center my-4">
                {{ restaurant.name }}
            </h1>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Menu -->
                <div class="col-lg-8 col-12">
                    <div class="menu-container m-0 my-rounded py-4 px-lg-5">
                        <h3 class="text-capitalize border-bottom py-4 m-0">menu</h3>
                        <div class="row mt-5">
                            <div class="col-12 col-md-4 mb-4 mt-0" v-for="dish in restaurant.dishes" :key="dish.id">
                                <div class=" dish-card row align-items-end flex-wrap mx-auto my-shadow"
                                    :class="dish.visible == 1 ? 'grey-filter' : ''">
                                    <div class="col-12 img-container">
                                        <img class="img-fluid image" :src="checkUrl(dish.dishPic)" :alt="dish.name" />
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center w-100 mt-3">
                                        <div>
                                            <div class=" text-left font-weight-bold col-12 text-capitalize px-4">
                                                {{ dish.name }}
                                            </div>

                                            <div class=" text-left font-weight-bold col-12 text-capitalize px-4 mb-3">
                                                <span class="euro">€ </span>{{ dish.price }}
                                            </div>
                                        </div>

                                        <div class="add-button-container mx-3 mb-3" @click="selectQt(dish)"
                                            :class="dish.visible == 1 ? 'd-none' : ''">
                                            <div class="add-button">+</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carrello -->
                <div class="col-lg-4 col-12">
                    <div class="menu-container m-0 my-rounded py-4 px-lg-5 mx-auto">
                        <div class="row border-bottom align-items-center">
                            <div class="col-8">
                                <h3 class="text-capitalize py-4 m-0">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    cart
                                </h3>
                            </div>
                            <div class="col-4">
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
                                    <div class="col-12">
                                        <div class="row border-bottom py-2" v-for="(cartItem, index) in cart"
                                            :key="index">
                                            <div class="col-6 text-capitalize">
                                                {{ cartItem.name }}
                                            </div>
                                            <div class="col-2">
                                              x{{ cartItem.quantity }}
                                            </div>
                                            <div class="col-3">€ {{ cartItem.price }}</div>
                                            <div class="col-1 trash" @click="deleteSingleDish(cartItem, index)">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-4" :class="length == 0 ? 'd-none' : ''">
                                    <div class="col-8 text-capitalize">total:</div>
                                    <div class="col-4">€{{ Math.round(total * 100) / 100 }}</div>
                                </div>
                                <!-- form -->
                                <div class="row form-group w-100">
                                  <form action="" method="" class="w-100" @submit.prevent>
                                    <div class="col-12 py-3">
                                      <h5>Your info :</h5>
                                    </div>
                                    <div class="col-12 mb-3">
                                      <input type="text" class="border-0 my-rounded bg-light w-100 px-4 py-2 form-control" placeholder="Name*" required v-model="orderName" >
                                    </div>
                                    <div class="col-12 mb-3">
                                      <input type="text" class="border-0 my-rounded bg-light w-100 px-4 py-2 form-control" placeholder="Surname*" required v-model="orderSurname">
                                    </div>
                                    <div class="col-12">
                                      <textarea class="form-control border-0 px-4 font-weight-lighter" placeholder="Add some comment, it will help us with the delivery" name="description" rows="3" v-model="orderComment"></textarea>
                                    </div>
                                    <div class="col-12 text-center py-3">
                                      <input type="submit" value="Checkout" class="btn btn-info rounded-pill" @click="sendOrder()">
                                    </div>
                                  </form>
                                </div>
                            </div>
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
                cart: [],
                counter: 0,
                total: 0,
                length: 0,
                qtDish: 1,

                orderName : '',
                orderSurname: '',
                orderComment: '',
                orderJson : {}
            };
        },
        methods: {
            getRestaurant() {
                axios
                    .get(`http://127.0.0.1:8000/api/restaurant/${this.$route.params.id}`)
                    .then((response) => {
                        this.restaurant = response.data.results;
                        this.cart = JSON.parse(localStorage.getItem("cart"));
                        this.length = this.cart.length;
                        this.total = localStorage.getItem("total");
                    })
                    .catch((error) => {
                        console.warn(error);
                    });
            },

            //! funzione che pusha in un array i piatti selezionati e li carica sul local storage
            addToCart(dish) {
                //? fixa il local storage al primo avvio o al clear in quanto risulta null
                if (this.cart == null) {
                    this.cart = [];
                }

                //? se il carrello e' vuoto pusha il piatto
                if (this.cart.length == 0) {
                    this.cart.push(dish); //<-qui mettiamo per la prima volta la qt
                    this.length++;
                    console.log(this.cart)
                    localStorage.setItem("cart", JSON.stringify(this.cart));
                }
                //!  se il carrello non e' vuoto controlliamo che stiamo ordinando dallo stesso ristorante in caso contrario resettiamo il cart e pushamo il piatto
                else if (this.cart[0].restaurant_id != this.$route.params.id) {
                    const result = window.confirm(
                        'If you click add here we\'ll clear your cart, because our policy says "you can order from only one restaurant", Are you sure?'
                    );
                    if (result) {
                        this.cart = [];
                        localStorage.clear();
                        this.cart.push(dish);
                        this.length++;
                        localStorage.setItem("cart", JSON.stringify(this.cart));
                    }
                }
                //! pushamo il piatto aggiuntivo
                else {
                    this.length++
                    for(let i=0; i<this.cart.length; i++ ){
                      if(this.cart[i].id===dish.id){
                        dish.quantity = this.cart[i].quantity+dish.quantity
                        console.log('sono entrato nel caso :'+dish.quantity)
            
                        this.cart[i]=dish;
                      }
                    }  
                    console.log(this.cart)
                    localStorage.setItem("cart", JSON.stringify(this.cart));
                }

                this.total = this.total + dish.price;
                localStorage.setItem("total", this.total);
            },

            //! clear del carrello
            clearCart() {
                //!popup per la conferma della cancellazione
                console.log(this.orderJson)
                if (this.cart != null && this.cart.length > 0) {
                    Vue.swal({
                        title: "Are you sure?",
                        showDenyButton: true,
                        confirmButtonText: "Yes",
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            this.cart = [];
                            localStorage.clear();
                            this.total = 0;
                            this.length = 0;
                            Swal.fire("Saved!", "", "success");
                        }
                    });
                } else {
                    Vue.swal("No item in cart");
                }
            },
            deleteSingleDish(dish, id) {
                console.log(dish);
                this.cart.splice(id, 1);
                this.length--;
                localStorage.clear();
                localStorage.setItem("cart", JSON.stringify(this.cart));
                if (this.cart.length != 0) {
                    this.total = this.total - dish.price;
                } else {
                    this.total = 0;
                }
            },

            //! funzione che controlla il path delle immagini se sono link o immagini caricate
            checkUrl(img) {
                console.log();
                if (img.includes("http")) {
                    return img;
                } else {
                    return "/storage/" + img;
                }
            },

            sendOrder(){
                this.orderJson ={'name': this.orderName, 'surname': this.orderSurname, 'comment': this.orderComment, 'total': this.total}
                axios.post(`http://127.0.0.1:8000/api/storeOrder`,{
                    data:[this.cart, this.orderJson]
                }).then((response) => {
                    console.warn(response)
                }).catch((error) => {
                    console.error(error)
                })
            },

            //! questa funzione permettera' all'utente quando clicca su + parte sweetalert dove puoi selezionare la quantita' e caricare sul carrello (aggiungere addToCart())
            selectQt(item){
              this.qtDish = 1  
              Vue.swal({
                  html: "<span id='minusDish' class='btn btn-warning rounded-pill mr-1'>-</span>"+this.qtDish+"<span class='btn btn-warning rounded-pill ml-1' id='plusDish'>+</span>",
                  confirmButtonText: "Add",
              }).then((result) => {
                  /* Read more about isConfirmed, isDenied below */
                  if (result.isConfirmed) {
                      item['quantity']= this.qtDish
                      console.error('quanto invio '+item.quantity)
                      this.addToCart(item)
                  }
              });
              let minus = document.getElementById('minusDish')
              let plus = document.getElementById('plusDish')
              minus.addEventListener('click', ()=>{
                if(this.qtDish>0){
                  this.qtDish--
                  console.log('Meno '+this.qtDish)
                }
              })
              plus.addEventListener('click', ()=>{
                if(this.qtDish>=0){
                  this.qtDish++
                  console.log('piu '+this.qtDish)
                }
              })
            },
        },
        created() {
            this.getRestaurant();
            
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
        height: 200px;
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
    }

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

    .form-container{
      input{
        border:none;
      }
    }
</style>