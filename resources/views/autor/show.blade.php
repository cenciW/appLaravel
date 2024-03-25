@extends('layouts.app')
@section('content')
    <div>
        <form>
            @include('autor.__form')
            <a href="{{ route('autor.index') }}">
                Cancelar
            </a>
        </form>
    </div>
@endsection