
@extends('layouts.layout')

@section('content')
<h3>Editar Cliente</h3>

@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form method="post" action="{{ route('clients.update', ['client' => $client->id]) }}">
    {{ csrf_field() }}

    {{ method_field('PUT') }}

    <div class="form-group">
        <label for="name">Nome</label>
    <input class="form-control" id="name" name="name" value="{{$client->name}}" />
    </div>

    <div class="form-group">
        <label for="document_number">Documento</label>
        <input class="form-control" id="document_number" name="document_number" value="{{$client->document_number}}" />
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input class="form-control" id="email" name="email" value="{{$client->email}}" />
    </div>

    <div class="form-group">
      <label for="phone">Telefone</label>
      <input class="form-control" id="phone" name="phone" value="{{$client->phone}}" />
    </div>

    <div class="form-group">
        <label for="marital_status">Estado Civil</label>
        <select class="form-control" id="marital_status" name="marital_status">
            <option value="">Selecione</option>
            <option value="1" @if($client->marital_status=='1') selected @endif>Solteiro</option>
            <option value="2" @if($client->marital_status=='2') selected @endif>Casado</option>
            <option value="3" @if($client->marital_status=='3') selected @endif>Divorciado</option>
        </select>
    </div>

    <div class="form-group">
        <label for="date_birth">Data Nascimento</label>
        <input class="form-control" id="date_birth" name="date_birth" type="date" value="{{$client->date_birth}}" />
    </div>

    <div class="radio">
        <label>
            <input type="radio" name="sex" value="m" {{$client->sex=='m         '?'checked="checked"':''}} /> Masculino
        </label>
    </div>

    <div class="radio">
        <label>
            <input type="radio" name="sex" value="f" {{$client->sex=='f         '?'checked="checked"':''}} /> Feminino
        </label>
    </div>

    <div class="form-group">
        <label for="physical_disability">Deficiência Física</label>
        <input class="form-control" id="physical-disability" name="physical_disability" value="{{$client->physical_disability}}" />
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="defaulter" id="defaulter" {{$client->defaulter?'checked="checked"':''}} /> Inadimplente?
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>

</form>
@endsection
