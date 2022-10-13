@extends('layouts.app')

@section('content')
    @include('admin.dish.includes.form', [
        'route' => 'admin.dish.update',
        'method' => 'PUT',
        'argument' => $newDish->id,
        'submit' => 'Aggiorna'
    ])
@endsection