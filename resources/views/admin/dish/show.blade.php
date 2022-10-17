@extends('layouts.app')

@section('content')
    <div class="container-lg mt-4">
        <div class="card mx-auto w-50 border-0">
            {{-- @dd(asset('/' . $dish->dishPic)) --}}
            @if (filter_var($dish->dishPic, FILTER_VALIDATE_URL))
                <img src="{{ $dish->dishPic }}" class="card-img-top" alt="{{ $dish->name }} photo">
            @else
                <img src="{{ asset('storage/' . $dish->dishPic)}}" class="card-img-top" alt="{{ $dish->name }} photo">
            @endif
            {{-- @if (substr(filter_var($dish->dishPic), 0, 4) === 'http')
                <img src="{{ $dish->dishPic }}" class="card-img-top" alt="{{ $dish->name }} photo">
            @else
                <img src="{{ asset('storage/' . $dish->dishPic)}}" class="card-img-top" alt="{{ $dish->name }} photo">
            @endif --}}
            <div class="card-body p-5">
                <h5 class="card-title text-capitalize">{{ $dish->name }}</h5>
                <p class="card-text">{{ $dish->description }}</p>
                <p class="card-text">Price: &nbsp; {{ $dish->price }} €</p>
                <div class="d-flex mt-5">
                    <div class="col-6 p-0 pr-2">
                        <a href="{{ route('admin.dish.edit', $dish->id) }}" class="btn btn-success w-100 rounded-pill my-btn-shadow p-2">Edit</a>
                    </div>
                    <div class="col-6 p-0 pl-2">
                        <form action="{{ route('admin.dish.destroy', $dish->id) }}" method="POST" class="btn-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100 rounded-pill my-btn-shadow p-2">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
