@extends('layouts.app')
@section('title','Empréstimos em atraso')

@section('content')
<div class="card">
  <div class="card-header">Empréstimos em atraso</div>
  <div class="card-body">
    @if($dados->count() === 0)
      <div class="empty">Nenhum atraso no momento.</div>
    @else
      <table class="table">
        <thead>
          <tr>
            <th>Usuário</th>
            <th>Livro</th>
            <th>Tombo</th>
            <th>Prevista</th>
            <th>Dias de atraso</th>
          </tr>
        </thead>
        <tbody>
          @foreach($dados as $emp)
            <tr>
              <td>{{ $emp->user->name }}</td>
              <td>{{ $emp->exemplar->livro->titulo }}</td>
              <td>{{ $emp->exemplar->tombo }}</td>
              <td>{{ \Carbon\Carbon::parse($emp->data_prevista)->format('d/m/Y') }}</td>
              <td>{{ \Carbon\Carbon::parse($emp->data_prevista)->diffInDays(now()) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection
