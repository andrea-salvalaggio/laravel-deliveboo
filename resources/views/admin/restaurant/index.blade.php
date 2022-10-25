@extends('layouts.app')

@section('title','Deliveboo | My Area')

@section('content')
    <div class="container" id="restaurant">

        @if (session('delete'))
            <div class="alert alert-success my-alert-delete container-lg" role="alert">

                    <div class="row align-items-center">
                        <div class="box-delete-img ">
                            <img src="{{ url('https://upload.wikimedia.org/wikipedia/commons/thumb/3/37/Oxygen480-actions-trash-empty.svg/192px-Oxygen480-actions-trash-empty.svg.png?20190510103517') }}" alt="success">
                        </div>
                        <div class="col-8">
                            <strong>Deleted!</strong>
                            <span class="text-capitalize">{{ session('delete') }}</span>
                        </div>
                    </div>

            </div>

        @endif

        @if (session('edited'))
            <div class="alert alert-success my-alert-success container-lg" role="alert">
                <div class="row align-items-center">
                    <div class="box-success-img ">
                        <img src="{{ url('https://www.svgrepo.com/show/13650/success.svg') }}" alt="success">
                    </div>
                    <div class="col-9">
                        <strong>Success!</strong>
                        <span class="text-capitalize">{{ session('edited') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @if (session('created'))

            <div class="alert alert-success my-alert-success container-lg" role="alert">
                <div class="row align-items-center">
                    <div class="box-success-img ">
                        <img src="{{ url('https://www.svgrepo.com/show/13650/success.svg') }}" alt="success">
                    </div>
                    <div class="col-9">
                        <strong>Success!</strong>
                        <span class="text-capitalize">{{ session('created') }}</span>
                    </div>
                </div>
            </div>
        @endif

        {{-- Categorie --}}
        <div class="row mt-1 align-items-center">
            <div class="col-md-5 col-6">
                <h1 class="font-weight-bolder">{{ $restaurants->name }}</h1>
            </div>
            <div class="col-md-7 col-12 col-lg-7 d-flex justify-content-sm-start justify-content-md-end flex-wrap mb-3">
                @forelse ($restaurants->categories as $category)
                    <span class="badge badge-pill text-white my-btn-shadow ml-2 mt-2 mt-md-2 px-3 py-2"
                        style="background-color: {{ $category->color }}">{{ $category->name }}</span>
                @empty
                @endforelse
            </div>
            <div class="col-md-5 col-6 mb-3">
                <p class="m-0"><i class="fa-solid fa-location-dot align-text-middle m-0"></i> &nbsp;{{ $restaurants->address }}</p>
                <p class="m-0"><i class="fa-solid fa-clock align-text-middle m-0"></i>
                    &nbsp;{{ substr($restaurants->open, 0, 5) }} – {{ substr($restaurants->close, 0, 5) }}
                </p>
            </div>
        </div>

        <div class="container-fluid p-0 my-3 position-relative">
            @if (filter_var($restaurants->restaurantPic, FILTER_VALIDATE_URL))
                <img src="{{ $restaurants->restaurantPic }}" alt="{{ $restaurants->name }} photo" class="rounded-5 radius-shadow">
            @else
                <img src="{{ asset('storage/' . $restaurants->restaurantPic) }}" alt="{{ $restaurants->name }} photo"
                    class="rounded-5 radius-shadow">
            @endif
        </div>

        <div class="container-lg">

            <div class="row ">
                <div class="col-12 my-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <a href="{{ route('admin.restaurant.edit', $restaurants->id) }}"
                                class="btn btn-outline-secondary rounded-pill w-100 py-4 font-weight-bold">
                                <span class="material-symbols-outlined align-middle mx-2">settings</span> Change restaurant
                                info
                            </a>
                        </div>
                        <div class="col-12 col-md-6 mt-5 mt-md-0">
                            <a href="{{ route('admin.dish.create') }}"
                                class="btn btn-outline-warning rounded-pill w-100 py-4 font-weight-bold">
                                <span class="material-symbols-outlined align-middle mx-1">add</span> Add new Dish
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 my-4">
                    <h2><span class="material-symbols-outlined h1 align-middle">restaurant_menu</span>
                        &nbsp;<span class="text-capitalize">dishes</span>
                    </h2>
                </div>
            </div>
            <div class="row justify-content-between px-md-5 p-2">
                @forelse ($dishes as $dish)
                    <div class="col-12 col-md-5 my-card my-shadow mb-5">
                        <div class="row">
                            <div class="col-2 my-text">ID</div>
                            <div class="col-4 my-text">Name</div>
                            <div class="col-2 my-text px-0">Price</div>
                            <div class="col-4 my-text">Status</div>
                            <div class="col-12 pr-md-4 w-100">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 font-weight-lighter">#{{ $dish->id }}</div>
                            <div class="col-4 text-capitalize font-weight-lighter">{{ $dish->name }}</div>
                            <div class="col-2 px-0 font-weight-lighter">€ {{ $dish->price }}</div>
                            <div class="col-4">
                                @if ($dish->visible == 0)
                                    <div class="badge my-badge-success badge-pill w-100"><small>available</small></div>
                                @else
                                    <div class="badge my-badge-danger badge-pill w-100"><small>not available</small></div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-4 py-2 text-center">
                                <a href="{{ route('admin.dish.show', $dish->id) }}"
                                    class="btn my-btn-primary rounded-pill w-100 text-white my-btn-shadow p-2">View</a>
                            </div>
                            <div class="col-4 py-2 text-center">
                                <a href="{{ route('admin.dish.edit', $dish->id) }}"
                                    class="btn my-btn-success rounded-pill w-100 text-white my-btn-shadow p-2">Edit</a>
                            </div>
                            <div class="col-4 py-2 text-center">
                                <form action="{{ route('admin.dish.destroy', $dish->id) }}" method="POST"
                                    class="btn-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn my-btn-danger rounded-pill w-100 text-white my-btn-shadow p-2">Delete</button>

                                </form>
                            </div>
                        </div>
                    </div>

                @empty
                    <h5>No dishes already created!</h5>
                @endforelse
            </div>


            {{-- TABELLA ORDINI --}}

            <div class="row">
                <div class="col-12 my-4">
                    <h2><span class="material-symbols-outlined h1 align-middle">list_alt</span>
                        &nbsp;<span class="text-capitalize">orders</span>
                    </h2>
                </div>
            </div>
            <div class="row justify-content-between px-md-5 p-2">
                @forelse ($orders as $order)
                    <div class="col-12 col-md-5 my-card my-shadow mb-5">
                        <div class="row">
                            <div class="col-4 my-text">ID</div>
                            <div class="col-4 my-text">Name</div>
                            <div class="col-4 my-text px-0">Surname</div>
                            <div class="col-12 pr-md-4 w-100">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 font-weight-lighter">#{{ $order->id }}</div>
                            <div class="col-4 text-capitalize font-weight-lighter">{{ $order->name }}</div>
                            <div class="col-4 px-1 font-weight-lighter">{{ $order->surname }}</div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-6 my-text text-capitalize">address</div>
                            <div class="col-6 my-text text-capitalize">comment</div>
                            <div class="col-12 pr-md-4 w-100">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 font-weight-lighter">{{ $order->address }}</div>
                            <div class="col-6 text-capitalize font-weight-lighter">{{ $order->comment }}</div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-6 my-text text-capitalize">dishes</div>
                            <div class="col-6 my-text text-capitalize pl-3">total price</div>
                            <div class="col-12 pr-md-4 w-100">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 font-weight-lighter">
                                <ul class="pl-0">
                                     @foreach ($order->dishes as $dish )
                                        <li>{{ $dish->name }} x{{ $dish->pivot->quantity }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-6 font-weight-lighter pl-3">€ {{ $order->price }}</div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 py-2 text-center">
                                <a href="{{ route('admin.order.show', $order->id) }}"
                                    class="btn my-btn-primary rounded-pill w-100 text-white my-btn-shadow p-2">View</a>
                            </div>
                        </div>

                    </div>

                @empty
                    <h5>No orders!</h5>
                @endforelse
            </div>

        </div>
    </div>
@endsection
