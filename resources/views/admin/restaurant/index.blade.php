@extends('layouts.app')

@section('content')
<div class="container" id="restaurant">

    <h1 class="mt-1 d-flex align-items-center">
        {{ $restaurants->name }}
        @forelse ($restaurants->categories as $category)
        <span class="badge badge-danger badge-pill small-badge mx-4">{{ $category->name }}</span>
        @empty

        @endforelse
    </h1>
    <p>
        {{ $restaurants->address }} | {{ substr( $restaurants->open , 0 , 5 ) }} - {{ substr( $restaurants->close , 0 ,
        5 ) }}
    </p>
    <div class="container-fluid p-0 my-3 position-relative">
        @if (filter_var($restaurants->restaurantPic, FILTER_VALIDATE_URL))
        <img src="{{ $restaurants->restaurantPic }}" alt="{{ $restaurants->name }} photo" class="rounded-2 ">
        @else
        <img src="{{ asset('storage/' . $restaurants->restaurantPic) }}" alt="{{ $restaurants->name }} photo"
            class="rounded-2">
        @endif


        <a href="{{ route('admin.restaurant.edit', $restaurants->id) }}"
            class="btn btn-info position-absolute floating-btn rounded-pill">
            Change restaurant info
        </a>
    </div>
    @if (session('delete'))
    <div class="alert alert-danger" role="alert">
        <span class="text-capitalize">{{ session('delete') }}</span> has been deleted.
    </div>
    @endif
    <div class="container-lg my-container">
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Available</th>
                    <th scope="col" class="text-center"><a href="{{ route('admin.dish.create') }}"
                            class="btn btn-warning rounded-pill px-5 ">Add new Dish</a></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($restaurants->dishes as $dish)
                <tr>
                    <th scope="row">{{ $dish->id }}</th>
                    <td class="text-capitalize">{{ $dish->name }}</td>
                    <td>
                        {{-- Controlliamo la lunghezza della stringa, se è maggiore di 15 la tagliamo --}}
                        @if (strlen($dish->description) > 15)
                        {{ substr($dish->description, 0, 15) }}...
                        @else
                        {{ $dish->description }}
                        @endif
                    </td>
                    <td>€{{ $dish->price }}</td>
                    <td>
                        @if ($dish->visible==0)
                        Yes
                        @else
                        No
                        @endif
                    </td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('admin.dish.show' , $dish->id) }}"
                            class="btn btn-primary rounded-pill">View</a>
                        <a href="{{ route('admin.dish.edit', $dish->id) }}"
                            class="btn btn-success rounded-pill mx-1">Edit</a>
                        <form action="{{ route('admin.dish.destroy' , $dish->id) }}" method="POST" class="btn-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill ">Delete</button>

                        </form>
                    </td>

                    @empty
                    <td scope="row">Could not find any dish</td>
                    @endforelse
                </tr>
            </tbody>
        </table>

        {{-- TABELLA ORDINI --}}

         <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope='col'>Description</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($restaurants->orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td class="text-capitalize">{{ $order->name }}</td>
                    <td class="text-capitalize">{{ $order->surname }}</td>
                    <td>
                        {{-- Controlliamo la lunghezza della stringa, se è maggiore di 15 la tagliamo --}}
                        @if (strlen($order->description) > 15)
                        {{ substr($order->description, 0, 15) }}...
                        @else
                        {{ $order->description }}
                        @endif
                    </td>
                    <td>{{ $order->address }}</td>
                    <td>€ {{ $order->price}}</td>

                    <td class="d-flex justify-content-center">
                        <a href="{{ route('admin.order.show' , $order->id) }}"
                            class="btn btn-primary rounded-pill">View</a>
                        <form action="{{ route('admin.order.destroy' , $order->id) }}" method="POST" class="btn-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill ">Delete</button>

                        </form>
                    </td>

                    @empty
                    <td scope="row">Could not find any order</td>
                    @endforelse
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

