@extends('layout.master')
@section('meio')

<h2>Listagem de Oportunidades</h2>
<br>

<form class="row g-3" method="get" action="{{route('opportunitys')}}" >
<div class="row">
  <div class="col">
        <select class="form-select" aria-label="Vendedores" name="users_id">
            <option selected value="">Selecione o Vendedor</option>
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
  </div>
  <div class="col">
    <input type="date" class="form-control" id="data" name="data" maxlength="10">
  </div>
    
    <div class="col">
        <button type="submit" class="btn btn-primary">Filtrar</button>
  </div>
</div>
</form>
<br>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#Código</th>
                <th scope="col">Oportunidade</th>
                <th scope="col">Data</th>
                <th scope="col">Aprovar</th>
                <th scope="col">Reprovar</th>
                <th scope="col">Alterar Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($opportunitys as $opportunity)
            <tr>
                <td>{{$opportunity->id}}</td>
                <td>{{$opportunity->title}}</td>
                <td>{{$opportunity->created_at->format('d/m/Y H:i')}}</td>

                <td>
                    <a href="/opportunitys/action/{{$opportunity->id}}/1">
                        <button type="button" class="btn btn-success">Aprovar</button>
                    </a>
                </td>
                <td>
                    <a href="/opportunitys/action/{{$opportunity->id}}/2">
                        <button type="button" class="btn btn-danger">Reprovar</button>
                    </a>
                </td>
                
                <td>
                    <a href="/opportunitys/update/{{$opportunity->id}}">
                        <button type="button" class="btn btn-primary">Alterar</button>
                    </a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection