
@extends('layouts.layout')

@section('content')
<h3>lista de clientes</h3>

<a href="{{ route('clients.create') }}" class="btn btn-primary">Novo</a>
<br /><br />
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CNPJ/CPF</th>
            <th>Data nasc.</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Sexo</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->document_number }}</td>
            <td>{{ $client->date_birth }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->sex }}</td>
            <td>
                <a href="{{route('clients.edit',['client' => $client->id])}}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
