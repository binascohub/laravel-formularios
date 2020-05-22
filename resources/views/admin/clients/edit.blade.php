
@extends('layouts.layout')

@section('content')
<h3>Editar Cliente</h3>

@include('form._errors')

<form method="post" action="{{ route('clients.update', ['client' => $client->id]) }}">

    {{ method_field('PUT') }}

    @include('admin.clients._form')

</form>
@endsection
