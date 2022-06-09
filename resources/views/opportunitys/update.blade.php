@extends('layout.master')
@section('meio')
<h2>Alterar Status da Oportunidade</h2>

@if (Session::has('status'))
<div class="alert alert-success" role="alert">
    {{Session::get('status'); }}
</div>
@endif


<form class="row g-3" method="post" action="{{route('opportunitys_update', ['opportunitys' => $opportunitys->id])}}">
    @csrf


    <div class="col-md-8">
        <label for="title" class="form-label">Titulo da Oportunidade</label>
        <input type="text" readonly="" class="form-control" id="title" name="title" maxlength="100" value="{{$opportunitys->title}}">
    </div>

    <div class="col-md-8">
        <label for="description" class="form-label">Descrição da Oportunidade</label>
        <input type="text" readonly="" class="form-control" id="description" name="description" maxlength="45" value="{{$opportunitys->title}}">
    </div>
    
    
    <div class="col-md-8">
        <label for="title" class="form-label">Status</label>
        <select class="form-select" aria-label="Status" name="status">
            <option value="1" {{ $opportunitys->status == 1 ? "selected" : "" }}>Ativa</option>
            <option value="2" {{ $opportunitys->status == 2 ? "selected" : "" }}>Perdida</option>
            <option value="3" {{ $opportunitys->status == 3 ? "selected" : "" }}>Vencida</option>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Alterar Status</button>
    </div>
</form>
@endsection