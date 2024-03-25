@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('autor.update', $registro->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('autor.__form')
            <button type="submit">
                Salvar Registro
            </button>
        </form>
    </div>
@endsection