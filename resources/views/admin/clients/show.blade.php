
@extends('layouts.layout')

@section('content')
<h3>Ver cliente</h3>
<a href="{{route('clients.edit',['client' => $client->id])}}"
   class="btn btn-primary" >Editar</a>
<br /><br />
<table class="table table-striped">
    <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{ $client->id }}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{ $client->name }}</td>
        </tr>
        <tr>
            <th scope="row">Documento</th>
            <td>{{ $client->document_number }}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{ $client->email }}</td>
        </tr>
        <tr>
            <th scope="row">Telefone</th>
            <td>{{ $client->phone }}</td>
        </tr>
        <tr>
            <th scope="row">Estado Civil</th>
            <td>
                @switch($client->marital_status)
                    @case(1)
                        Solteiro
                        @break
                    @case(2)
                        Casado
                        @break
                    @case(3)
                        Divorciado
                        @break
                @endswitch
            </td>
        </tr>
        <tr>
            <th scope="row">Data Nasc.</th>
            <td>{{ $client->date_birth }}</td>
        </tr>
        <tr>
            <th scope="row">Sexo</th>
            <td>{{ $client->sex }}</td>
        </tr>
    </tbody>
</table>
@endsection
