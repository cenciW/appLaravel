@extends('layouts.app')
@section('content')
    <div>
        <form action="{{route('autor.destroy', $registro->id) }}" method="POST">
            @csrf
            @method('DELETE')
            @include('autor.__form')
            <button type="submit">
                Excluir Registro
            </button>
        </form>
    </div>
@endsection