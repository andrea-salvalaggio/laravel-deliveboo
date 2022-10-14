@extends('layouts.app')

@section('content')
    @include('admin.dish.includes.form', [
        'route' => 'admin.dish.store',
        'method' => 'POST',
        'argument' => ' ',
        'submit' => 'Create'
    ])
@endsection