
@extends('layouts.layout')

@section('content')
<h3>Novo Cliente</h3>

@include('form._errors')

<form method="post" action="{{ route('clients.store') }}">

    {{ csrf_field() }}

    @include('admin.clients._form')

</form>
@endsection
