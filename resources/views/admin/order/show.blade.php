@extends('layouts.app')

@section('content')
    <div class="container-lg mt-4">
        <div class="card mx-auto w-50 border-0" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-capitalize">{{ $order->name . ' ' . $order->surname}}</h5>
                <p class="card-text">{{ $order->address }}.</p>
                <p class="card-text">{{ $order->description }}.</p>
                <p class="card-text">Price: {{ $order->price }} €</p>
                <div class="d-flex">
                    <div class="mx-2">
                        <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" class="btn-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
