@extends('layouts.app')

@section('content')

<div class="container-lg mt-5">
    <div class="row">
@forelse ($categories as $category)
        <div class="col-4 my-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h3 class="card-title">{{ $category->name }}</h3>
                </div>
            </div>
        </div>

@empty
    </div>
</div>

@endforelse

@endsection
