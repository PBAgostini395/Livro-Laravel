@extends('layouts.app')
@section('title','Novo Exemplar')

@section('content')
<div class="card">
  <div class="card-header">Novo Exemplar</div>
  <div class="card-body">
    <form method="POST" action="{{ route('exemplares.store') }}">
      @csrf
      <div class="form-group">
        <label>Livro</label>
        <select name="livro_id">
          <option value="">Selecione...</option>
          @foreach($livros as $l)
            <option value="{{ $l->id }}" @selected(old('livro_id')==$l->id)>{{ $l->titulo }}</option>
          @endforeach
        </select>
        @error('livro_id') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Tombo</label>
        <input name="tombo" value="{{ old('tombo') }}">
        @error('tombo') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="row">
        <a class="btn" href="{{ route('exemplares.index') }}">Voltar</a>
        <button class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
</div>
@endsection
