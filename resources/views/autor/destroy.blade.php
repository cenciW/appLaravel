@extends('layouts.app')
@section('content')
<div>
    <x-local-sistema titulo="Exclusão de Autores" descricao="Excluir registro de autores" url="{{route('autor.index')}}" nomeUrl="Voltar para a listagem de autores" />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form action="{{route('autor.destroy', $registro->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @include('autor.__form')
                    <button type="submit">
                        Excluir Registro
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection