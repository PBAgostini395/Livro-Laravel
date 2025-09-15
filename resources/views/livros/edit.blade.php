@extends('layouts.app')
@section('title','Editar Livro')

@section('content')
<div class="card">
  <div class="card-header">Editar Livro #{{ $livro->id }}</div>
  <div class="card-body">

    @if ($errors->any())
      <div style="background:#fee2e2;color:#b91c1c;padding:10px;border-radius:8px;margin-bottom:15px">
        <strong>Erro(s):</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('livros.update', $livro) }}">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label>Título *</label>
        <input name="titulo" value="{{ old('titulo', $livro->titulo) }}" required>
      </div>

      <div class="form-group">
        <label>Autor</label>
        <input name="autor" value="{{ old('autor', $livro->autor) }}">
      </div>

      <div class="form-group">
        <label>ISBN</label>
        <input name="isbn" value="{{ old('isbn', $livro->isbn) }}">
      </div>

      <div class="form-group">
        <label>Ano</label>
        <input type="number" name="ano" value="{{ old('ano', $livro->ano) }}">
      </div>

      <div class="form-group" style="flex-direction:row;align-items:center;gap:8px">
        <input type="hidden" name="ativo" value="0">
        <input type="checkbox" id="ativo" name="ativo" value="1" {{ old('ativo', $livro->ativo) ? 'checked' : '' }}>
        <label for="ativo">Ativo</label>
      </div>

      <button class="btn">Salvar alterações</button>
    </form>
  </div>
</div>
@endsection
