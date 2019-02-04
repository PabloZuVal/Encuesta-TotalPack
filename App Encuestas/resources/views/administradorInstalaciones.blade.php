@extends('layouts.app')

@section('content')

    <h1>Estoy en administrador de instalaciones</h1>

    <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

@endsection