@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="container-fluid myBackground text-center align-self-center">
            <img class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-4  error-image pt-3" src="{{ asset('images/hamburger.png') }}" alt="no pass">
        </div>
    </div>

    <h1 class="text-center">Page Not Found</h1>
    <div class="text-error text-center">Sorry, but the page you are looking for doesn’t exist.</div>
    <div class="text-error text-center">But there’s loads more to see!</div>
    <div class="nav-item my-btn rounded-pill py-1 px-4 my-btn-shadow mt-2 mt-md-0 text-center ">
        <a class="nav-link text-white px-0" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
    </div>

@endsection
