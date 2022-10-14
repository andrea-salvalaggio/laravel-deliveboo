@extends('layouts.app')

@section('content')
    @include('admin.restaurant.includes.form', [
        'route' => 'admin.restaurant.store',
        'method' => 'POST',
        'argument' => ' '
    ])
@endsection