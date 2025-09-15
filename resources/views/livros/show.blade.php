@extends('layouts.app')
@section('title',$livro->titulo)

@section('content')
<div class="card">
  <div class="card-header">{{ $livro->titulo }}</div>
  <div class="card-body">
    <p><strong>Autor:</strong> {{ $livro->autor->nome }}</p>
    <p><strong>Categoria:</strong> {{ $livro->categoria->nome }}</p>
    <p><strong>ISBN:</strong> {{ $livro->isbn }}</p>
    <p><strong>Ano:</strong> {{ $livro->ano }}</p>

    <h4 style="margin-top:18px;">Exemplares</h4>
    @if($livro->exemplares->count() == 0)
      <div class="empty">Nenhum exemplar cadastrado para este livro.</div>
    @else
      <ul>
        @foreach($livro->exemplares as $ex)
          <li>
            Tombo: {{ $ex->tombo }}
            @php $status=$ex->status; @endphp
            <span class="badge
              {{ $status==='disponivel'?'badge-green':'' }}
              {{ $status==='emprestado'?'badge-yellow':'' }}
              {{ $status==='manutencao'?'badge-gray':'' }}">
              {{ ucfirst($status) }}
            </span>
          </li>
        @endforeach
      </ul>
    @endif

    <div style="margin-top:16px;">
      <a class="btn" href="{{ route('livros.index') }}">Voltar</a>
      <a class="btn btn-primary" href="{{ route('livros.edit',$livro) }}">Editar</a>
    </div>
  </div>
</div>
@endsection
