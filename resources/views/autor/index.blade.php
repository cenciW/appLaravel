@extends('layouts.app')
@section('content')
<div>
    <x-local-sistema titulo="Listagem de Autores" descricao="Listagem de autores cadastrados" url="{{route('dashboard')}}" nomeUrl="Página principal" />
    <div class="container">
        <div class="tile">
            <div class="tile-body">
                <form class="row g-3 align-items-center" action="{{route('autor.index')}}" method="POST">
                    @csrf
                    <div class="col-6">
                        <div class="input-group">
                            <!-- <div class="input-group-text">@</div> -->
                            <input type="text"
                                class="form-control"
                                id="pesquisar"
                                name="pesquisar"
                                placeholder="Pesquisa">
                        </div>
                    </div>

                    <div class="col-2">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref" name="qtdPorPag">
                            @foreach($pages as $qtdPorPag)
                                <!-- <option selected>Opções...</option> -->
                                <option value="{{$qtdPorPag}}"
                                @if($item == $qtdPorPag) selected @endif>
                                {{$qtdPorPag}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                
                <br>
                <table class="table table-stripped table-bordered table-hover">
                    <tr class="cabecalho">
                        <th>Nome</th>
                        <!-- <th>Apelido</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>CEP</th> -->
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                    <tbody>
                        @foreach($registros as $registro)
                        <tr> <!-- linha-->
                            <!-- colunas-->
                            <td>{{ $registro->nome }}</td>
                            <!-- <td>{{ $registro->apelido }}</td>
                            <td>{{ $registro->cidade }}</td>
                            <td>{{ $registro->bairro }}</td>
                            <td>{{ $registro->cep }}</td> -->
                            <td>{{ $registro->email }}</td>
                            <td>{{ $registro->telefone }}</td>
                            <td class="centralizado">
                                <!--rotina para exclusao, edicao e delecao-->
                                <a type="button" class="btn btn-secondary btn-sm" href="{{ route('autor.edit', $registro->id) }}">Alteração</a>

                                <a type="button" class="btn btn-danger btn-sm" href="{{ route('autor.delete', $registro->id) }}">Exclusão</a>

                                <a type="button" class="btn btn-info btn-sm" href="{{ route('autor.show', $registro->id) }}">Consulta</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a type="button" class="btn btn-primary btn-lg" href="{{ route('autor.create')}}">Inclusão de novos autores</a>
            </div>
        </div>
    </div>
</div>
@endsection