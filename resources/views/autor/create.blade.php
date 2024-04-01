@extends('layouts.app')
@section('content')

<x-local-sistema
    titulo="Inclusão de Autor"
    descricao="Cadastrar novos autores"
    url="{{route('autor.index')}}"
    nomeUrl="Voltar para a listagem de autores"
/>
<div class="tile">
    <div class="tile-body">
        <div>
            <form action="{{route('autor.store') }}" method="POST">
                @csrf
                @include('autor.__form')

                <button type="submit" class="btn btn-secondary btn-lg">
                    Salvar Cadastro do Autor
                </button>
            </form>
        </div>
    </div>
</div>
@endsection