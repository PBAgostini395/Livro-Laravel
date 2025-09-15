@extends('layouts.app')
@section('title','Lista de Livros')

@section('content')
<div class="card">
  <div class="card-header">Livros cadastrados</div>
  <div class="card-body">
    @if($livros->count() === 0)
      <p>Nenhum livro cadastrado.</p>
      <a href="{{ route('livros.create') }}" class="btn">Cadastrar novo livro</a>
    @else
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Título</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Ano</th>
            <th>Ativo</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($livros as $livro)
            <tr>
              <td>{{ $livro->id }}</td>
              <td>{{ $livro->titulo }}</td>
              <td>{{ $livro->autor }}</td>
              <td>{{ $livro->isbn }}</td>
              <td>{{ $livro->ano }}</td>
              <td>{{ $livro->ativo ? 'Sim' : 'Não' }}</td>
              <td style="display:flex;gap:8px">
                <a class="btn btn-secondary" href="{{ route('livros.edit', $livro) }}">Editar</a>
                <form method="POST" action="{{ route('livros.destroy', $livro) }}" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Excluir</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div style="margin-top:12px">
        {{ $livros->links() }}
      </div>
    @endif
  </div>
</div>
@endsection
