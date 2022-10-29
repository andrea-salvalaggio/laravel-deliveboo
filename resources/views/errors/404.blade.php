@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div class="row">
        <!-- Immagine 404 -->
        <div class="col-12">
            <img class="img-fluid" src="../../../images/404-page.png" alt="404 page | Return Home">
        </div>

        <div class="col-12 px-4">
            <h4 class="text-center">Whoops! The page you are looking for is not on the menu</h4>
        </div>

        <!-- Bottoni in desktop -->
        <div class="nav-item my-btn rounded-pill my-btn-shadow text-center mx-auto px-4 py-1 mt-3">
            <a href="/" class="nav-link text-white my-btn px-0"><i class="fa-solid fa-house mr-2"></i>Back Home</a>
        </div>
    </div>
</div>
@endsection