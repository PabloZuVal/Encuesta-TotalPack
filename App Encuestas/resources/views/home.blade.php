@extends('layouts.app')

@section('content')

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        Estas logeado! - Puedes gestionar las encuestas.
    </div>
    
@endsection
