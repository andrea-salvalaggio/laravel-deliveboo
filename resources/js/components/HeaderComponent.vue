<template>
    <header>
        <div class="container-lg">
            <div class="row justify-content-between py-4 px-md-0 px-2 align-content-center">
                <div class="col-4">
                    <img src="https://cdn.discordapp.com/attachments/1027584701415833620/1030102818239041627/deliveboo-logo-desktop.png" alt="logo image" class="d-md-block d-none">
                    <img src="https://cdn.discordapp.com/attachments/1027584701415833620/1030102849801179208/deliveboo-logo-mobile.png" alt="logo image" class="d-md-none">
                </div>
                <!-- hamburger menu -->
                <div class="col-4 d-md-none">
                    <div id="menuToggle">
                        <input type="checkbox" />
                        <span id="span1"></span>
                        <span id="span2"></span>
                        <span id="span3"></span>
                    </div>
                </div>
                <!-- bottoni in desktop -->
                <div class="col-4 d-none d-md-block">

                </div>
            </div>
            <!-- menu che appare al click dell'hamburger -->
            <div class="row">
                <a href="/login" class="btn btn-primary rounded-pill">Login</a>
                <a href="/register" class="btn btn-warning rounded-pill">Register</a> 
            </div>
        </div>
    </header>
</template>

<script>

</script>
 <style scoped lang="scss">
 @import '../../sass/variables';
    #menuToggle {
        overflow: hidden;
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #menuToggle input {
    display: flex;
    width: 57px;
    height: 57px;
    position: absolute;
    cursor: pointer;
    opacity: 0; /* hide input */
    z-index: 1; /* top of the menu */
    }

    #menuToggle span{
        width: 52px;
        height: 5px;
        margin-bottom: 10px;
        background: $primaryColor;
        border-radius: 4px;
        -webkit-transition: all .5s cubic-bezier(.08,.81,.87,.71);
        -moz-transition: all .5s cubic-bezier(.08,.81,.87,.71);
        -ms-transition: all .5s cubic-bezier(.08,.81,.87,.71);
        -o-transition: all .5s cubic-bezier(.08,.81,.87,.71);
        transition: all .5s cubic-bezier(.08,.81,.87,.71);
    }

    #span1 {
    transform-origin: 7px 0px;
    }

    #span3 {
    transform-origin: bottom right;
    }

    #menuToggle input:checked ~ #span1 {
    background-color: $primaryColor;
    transform: rotate(45deg) translate(6px);
    }
    #menuToggle input:checked ~ #span2 {
    background-color: $primaryColor;
    transform: rotate(495deg) translate(4px);   
    }
    #menuToggle input:checked ~ #span3 {
    background-color: $primaryColor;
    transform: rotate(45deg);
    opacity: 0;
    }
 </style>
