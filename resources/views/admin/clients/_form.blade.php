{{ csrf_field() }}

<div class="form-group">
    <label for="name">Nome</label>
    <input class="form-control" id="name" name="name"
        value="{{old('name',$client->name)}}" />
</div>

<div class="form-group">
    <label for="document_number">Documento</label>
    <input class="form-control" id="document_number" name="document_number"
        value="{{old('document_number',$client->document_number)}}" />
</div>

<div class="form-group">
    <label for="email">E-mail</label>
    <input class="form-control" id="email" name="email"
        value="{{old('email',$client->email)}}" />
</div>

<div class="form-group">
    <label for="phone">Telefone</label>
    <input class="form-control" id="phone" name="phone"
        value="{{old('phone',$client->phone)}}" />
</div>

@php
    $marital_status = old('marital_status',$client->marital_status);
@endphp
<div class="form-group">
    <label for="marital_status">Estado Civil</label>
    <select class="form-control" id="marital_status" name="marital_status">
        <option value="">Selecione</option>
        <option value="1" @if($marital_status=='1') selected @endif>Solteiro</option>
        <option value="2" @if($marital_status=='2') selected @endif>Casado</option>
        <option value="3" @if($marital_status=='3') selected @endif>Divorciado</option>
    </select>
</div>

<div class="form-group">
    <label for="date_birth">Data Nascimento</label>
    <input class="form-control" id="date_birth" name="date_birth" type="date"
        value="{{old('date_birth',$client->date_birth)}}" />
</div>

<div class="radio">
    <label>
        <input type="radio" name="sex" value="m"
            @if(old('sex',$client->sex)=='m') checked @endif /> Masculino
    </label>
</div>

<div class="radio">
    <label>
        <input type="radio" name="sex" value="f"
            @if(old('sex',$client->sex)=='f') checked @endif /> Feminino
    </label>
</div>

<div class="form-group">
    <label for="physical_disability">Deficiência Física</label>
    <input class="form-control" id="physical-disability" name="physical_disability"
        value="{{old('physical_disability',$client->physical_disability)}}" />
</div>

<div class="checkbox">
    <label>
        <input type="checkbox" name="defaulter" id="defaulter"
            @if($client->defaulter) checked @endif /> Inadimplente?
    </label>
</div>
<button type="submit" class="btn btn-primary">Salvar</button>
