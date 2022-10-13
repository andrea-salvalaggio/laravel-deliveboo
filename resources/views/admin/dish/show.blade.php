@extends('layouts.app')

@section('content')
<div class="container-lg mt-4">
  <div class="card mx-auto w-50 border-0" style="width: 18rem;">
    <img src="{{ $dish->dishPic }}" class="card-img-top" alt="{{ $dish->name }} photo">
    <div class="card-body">
      <h5 class="card-title text-capitalize">{{ $dish->name }}</h5>
      <p class="card-text">{{ $dish->description }}.</p>
      <div class="d-flex">
        <div>
          <a href="{{ route('admin.dish.edit', $dish->id) }}" class="btn btn-success rounded-pill">Edit</a>
        </div>
        
        <div class="mx-2">
          <form action="{{ route('admin.dish.destroy' , $dish->id) }}" method="POST">
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