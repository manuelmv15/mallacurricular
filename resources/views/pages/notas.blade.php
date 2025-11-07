@extends('pages.base')

@section('main')
<div class="container py-4">

  @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <div class="d-flex align-items-center justify-content-between mb-3">
    <h3 class="mb-0">Editar notas</h3>
    <div class="small text-muted">Escala: 0 – 10 (deja vacío para <i>sin nota</i>)</div>
  </div>

  <form method="POST" action="{{ route('asignaturas.notas.update') }}" id="form-notas">
    @csrf

    <div class="table-responsive">
      <table class="table table-sm align-middle">
        <thead class="table-light">
          <tr>
            <th style="width:70px">Ciclo</th>
            <th style="width:120px">Código</th>
            <th>Nombre</th>
            <th style="width:120px">Tipo</th>
            <th style="width:140px">Nota</th>
            <th style="width:80px"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($asignaturas as $a)
            <tr>
              <td class="text-center">{{ $a->ciclo ?? '—' }}</td>
              <td><span class="fw-semibold">{{ $a->codigo }}</span></td>
              <td>{{ $a->nombre }}</td>
              <td>
                <span class="badge {{ strcasecmp($a->tipo,'Obligatoria')===0 ? 'text-bg-primary' : 'text-bg-warning' }}">
                  {{ $a->tipo }}
                </span>
              </td>
              <td>
                <input
                  type="number"
                  name="notas[{{ $a->id }}]"
                  class="form-control form-control-sm"
                  value="{{ $a->nota }}"
                  step="0.01" min="0" max="10" placeholder="—">
              </td>
              <td>
                <button type="button" class="btn btn-outline-secondary btn-sm"
                        onclick="this.closest('tr').querySelector('input[name^=notas]').value='';">
                  Limpiar
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @error('notas.*')
      <div class="text-danger small mt-2">{{ $message }}</div>
    @enderror

    <div class="d-flex gap-2 mt-3">
      <button type="submit" class="btn btn-success">Guardar cambios</button>
      <button type="reset" class="btn btn-outline-secondary">Reiniciar campos</button>
    </div>
  </form>
</div>
@endsection
