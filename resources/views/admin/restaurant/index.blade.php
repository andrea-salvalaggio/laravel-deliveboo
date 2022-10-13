@extends('layouts.app')

@section('content')
<div class="container" id="restaurant">

    <h1 class="mt-1"> 
        Ristorante: {{ $restaurants->name }}
    </h1>
    <div class="container-fluid p-0 my-3 position-relative" >
        <img src="{{ $restaurants->restaurantPic }}" alt="{{ $restaurants->name }} photo" class="rounded-2 ">
        <a href="" class="btn btn-info position-absolute floating-btn rounded-pill">Change img</a>
    </div>
    @if (session('delete'))
        <div class="alert alert-danger" role="alert">
           <span class="text-capitalize">{{ session('delete') }}</span> has been deleted.
        </div>
    @endif
    <table class="table table-striped mt-5">
        <thead >
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Available</th>
            <th scope="col"><a href="{{ route('admin.dish.create') }}" class="btn btn-outline-dark btn-warning rounded-pill">Add new Dish</a></th>
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
                <td class="d-flex">
                    <a href="{{ route('admin.dish.show' , $dish->id) }}" class="btn btn-primary rounded-pill">View</a>
                    <a href="{{ route('admin.dish.edit', $dish->id) }}" class="btn btn-success rounded-pill mx-1">Edit</a>
                    <form action="{{ route('admin.dish.destroy' , $dish->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
                    </form>
                </td>

            @empty
                <td scope="row">Could not find any dish</td>
            @endforelse
          </tr>
        </tbody>
      </table>
</div>
@endsection