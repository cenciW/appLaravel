@extends('layouts.app')
@section('content')
    <div>
        <x-local-sistema
            titulo="Consulta de Autores"
            descricao="Consultar registro de autores"
            url="{{route('autor.index')}}"
            nomeUrl="Voltar para a listagem de autores"
        />
        <form>
            @include('autor.__form')
            <a href="{{ route('autor.index') }}">
                Cancelar
            </a>
        </form>
    </div>
@endsection