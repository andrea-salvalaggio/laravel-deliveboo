@extends('layouts.app')

@section('content')
    @include('admin.restaurant.includes.form', [
        'route' => 'admin.restaurant.update',
        'method' => 'PUT',
        'argument' => $newRestaurant->id
    ])
@endsection