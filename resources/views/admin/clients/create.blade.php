
@extends('layouts.layout')

@section('content')
<h3>Novo Cliente</h3>
<h4>{{$clientType == \App\Client::TYPE_INDIVIDUAL ? 'Pessoa Física' : 'Pessoa Jurídica'}}</h4>


<a href="{{route('clients.create',['client_type' => \App\Client::TYPE_INDIVIDUAL])}}">Pessoa Física</a> |
<a href="{{route('clients.create',['client_type' => \App\Client::TYPE_LEGAL])}}">Pessoa Jurídica</a>

@include('form._errors')

<form method="post" action="{{ route('clients.store') }}">

    {{ csrf_field() }}

    @include('admin.clients._form')

</form>
@endsection
