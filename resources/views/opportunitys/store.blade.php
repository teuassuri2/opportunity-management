@extends('layout.master')
@section('meio')

<h2>Cadastro de Oportunidades</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('status'))
<div class="alert alert-success" role="alert">
    {{Session::get('status'); }}
</div>
@endif
<form class="row g-3" method="post" action="{{route('opportunitys_store_create')}}">
    @csrf

    <div class="col-md-8">
        <label for="title" class="form-label">Produtos</label>
        <select class="form-select" aria-label="Default select example" name="products_id">
            <option selected value="">Selecione o produto</option>
            @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-8">
        <label for="title" class="form-label">Cliente</label>
        <select class="form-select" aria-label="Default select example" name="customers_id">
            <option selected value="">Selecione o Cliente</option>
            @foreach($customers as $customer)
            <option value="{{$customer->id}}">{{$customer->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-8">
        <label for="title" class="form-label">Titulo da Oportunidade</label>
        <input type="text" class="form-control" id="title" name="title" maxlength="100" value="{{old('title')}}">
    </div>

    <div class="col-md-8">
        <label for="description" class="form-label">Descrição da Oportunidade</label>
        <input type="text" class="form-control" id="description" name="description" maxlength="45" value="{{old('description')}}">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>
@endsection