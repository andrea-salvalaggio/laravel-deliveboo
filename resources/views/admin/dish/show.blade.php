@extends('layouts.app')

@section('content')
    <div class="container-lg my-5">
        <div class="card my-rounded my-shadow mx-auto w-50 border-0">
            {{-- @dd(asset('/' . $dish->dishPic)) --}}
            @if (filter_var($dish->dishPic, FILTER_VALIDATE_URL))
                <img src="{{ $dish->dishPic }}" class="card-img-top my-rounded-top" alt="{{ $dish->name }} photo">
            @else
                <img src="{{ asset('storage/' . $dish->dishPic)}}" class="card-img-top my-rounded-top" alt="{{ $dish->name }} photo">
            @endif
            {{-- @if (substr(filter_var($dish->dishPic), 0, 4) === 'http')
                <img src="{{ $dish->dishPic }}" class="card-img-top" alt="{{ $dish->name }} photo">
            @else
                <img src="{{ asset('storage/' . $dish->dishPic)}}" class="card-img-top" alt="{{ $dish->name }} photo">
            @endif --}}
            <div class="card-body p-5">
                <h5 class="card-title text-capitalize font-weight-bold h2">{{ $dish->name }}</h5>
                <p class="card-text my-4">{{ $dish->description }}</p>
                <hr>
                <p class="card-text h4 font-weight-bolder mt-4">€ {{ $dish->price }}</p>
                <div class="row mt-5">
                    <div class="col-12 p-0">
                        <a href="{{ route('admin.dish.edit', $dish->id) }}" class="btn my-btn-success w-100 rounded-pill text-white my-btn-shadow p-2">Edit</a>
                    </div>
                    <div class="col-12 p-0 mt-3">
                        <form action="{{ route('admin.dish.destroy', $dish->id) }}" method="POST" class="btn-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn my-btn-danger w-100 rounded-pill text-white my-btn-shadow p-2">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
