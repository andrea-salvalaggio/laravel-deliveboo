@extends('layouts.app')

@section('content')
    <div class="container-lg mt-4 head-form">

        {{-- Bottone Go Back --}}
        <div class="col-lg-6 col-md-6 col-sm-10 mx-auto mb-4 p-0">
            <a href="{{ route('admin.restaurant.index') }}" class="btn btn-outline-secondary rounded-pill px-3 py-2">
                <i class="fa-solid fa-angle-left pr-2"></i>Go Back
            </a>
        </div>

        <div class="card col-lg-6 col-md-6 col-sm-10 mx-auto my-rounded my-shadow mx-auto border-0">
            <div class="card-body p-5">
                <h2 class="font-weight-bold">Details:</h2>
                <p class="card-title text-capitalize mt-5">Name: &nbsp;{{ $order->name . ' ' . $order->surname}}</p>
                <p class="card-text">Address: &nbsp;{{ $order->address }}</p>
                <div class="d-flex">
                    <p class="card-text">Dishes:
                        <div>
                            <ul class="pl-2">
                                @foreach ( $order->dishes as $dish)
                                <li>{{ $dish->name }} x{{ $dish->pivot->quantity }} - €{{ $dish->price }} (Cad.)</li>
                                @endforeach
                            </ul>
                        </div>
                    </p>
                </div>
                <p class="card-text text-capitalize">Other info: &nbsp;{{ $order->description }}</p>
                <hr class="my-4">
                <p class="mb-0">Total Price: <span class="card-text font-weight-bolder h4 align-botton">&nbsp;€ {{ $order->price }}</span></p>
            </div>
        </div>
    </div>
@endsection
