@extends('layouts.app')
@section('title','Exemplares')

@section('content')
<div class="card">
  <div class="card-header">Exemplares</div>
  <div class="card-body">
    <form method="GET" class="row" style="margin-bottom:12px;">
      <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar por título, tombo...">
      <button class="btn">Buscar</button>
      @can('create', App\Models\Exemplar::class)
        <a class="btn btn-primary" href="{{ route('exemplares.create') }}">Novo Exemplar</a>
      @endcan
    </form>

    @if($exemplares->count() === 0)
      <div class="empty">Nenhum exemplar cadastrado.</div>
    @else
      <table class="table">
        <thead>
          <tr>
            <th>Livro</th>
            <th>Tombo</th>
            <th>Status</th>
            <th style="width:280px;">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($exemplares as $ex)
            <tr>
              <td>{{ $ex->livro->titulo }}</td>
              <td>{{ $ex->tombo }}</td>
              <td>
                @php $status=$ex->status; @endphp
                <span class="badge
                  {{ $status==='disponivel'?'badge-green':'' }}
                  {{ $status==='emprestado'?'badge-yellow':'' }}
                  {{ $status==='manutencao'?'badge-gray':'' }}">
                  {{ ucfirst($status) }}
                </span>
              </td>
              <td>
                @if($ex->status==='disponivel')
                  <form method="POST" action="{{ route('emprestar',$ex) }}" style="display:inline">
                    @csrf
                    <button class="btn btn-primary">Emprestar</button>
                  </form>
                @else
                  @php $emp = $ex->emprestimos()->latest()->first(); @endphp
                  @if($emp && !$emp->data_devolucao)
                    <form method="POST" action="{{ route('devolver',$emp) }}" style="display:inline">
                      @csrf
                      <button class="btn">Devolver</button>
                    </form>
                  @endif
                @endif

                @can('delete',$ex)
                  <form method="POST" action="{{ route('exemplares.destroy',$ex) }}" style="display:inline" onsubmit="return confirm('Remover este exemplar?');">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Apagar</button>
                  </form>
                @endcan
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div style="margin-top:10px;">{{ $exemplares->withQueryString()->links() }}</div>
    @endif
  </div>
</div>
@endsection
