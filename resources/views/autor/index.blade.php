@extends('layouts.app')
@section('content')
<div>
    <x-local-sistema
        titulo="Listagem de Autores"
        descricao="Listagem de autores cadastrados"
        url="{{route('dashboard')}}"
        nomeUrl="Página principal"
    />
    <table>
        <tr>
            <th>Nome</th>
            <th>Apelido</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>CEP</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <tbody>
            @foreach($registros as $registro)
            <tr> <!-- linha-->
                <!-- colunas-->
                <td>{{ $registro->nome }}</td>
                <td>{{ $registro->apelido }}</td>
                <td>{{ $registro->cidade }}</td>
                <td>{{ $registro->bairro }}</td>
                <td>{{ $registro->cep }}</td>
                <td>{{ $registro->email }}</td>
                <td>{{ $registro->telefone }}</td>
                <td>
                    <!--rotina para exclusao, edicao e delecao-->
                    <a href="{{ route('autor.edit', $registro->id) }}">Alteração</a>
                    <a href="{{ route('autor.delete', $registro->id) }}">Exclusão</a>
                    <a href="{{ route('autor.show', $registro->id) }}">Consulta</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('autor.create')}}">Incluir</a>

</div>
@endsection