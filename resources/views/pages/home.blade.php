@extends('pages.base')

@section('main')
<a class="nav-link" href="{{ route('asignaturas.notas.edit') }}">
  Editar notas
</a>
<div class="full-bleed mt-4">  {{-- ancho completo, sin márgenes --}}
  <h2 class="text-center fw-bold mb-4">Plan de Estudio</h2>

  <div>
    <table class="table plan-table align-top text-center">
      <thead class="table-light">
        <tr>
          @if(($porCiclo[0] ?? collect())->isNotEmpty())
            <th class="text-center" style="width: {{ 100/($totalCiclos + 1) }}%;">Sin ciclo</th>
          @endif

          @for ($c = 1; $c <= $totalCiclos; $c++)
            <th class="text-center" style="width: {{ 100/($totalCiclos + (($porCiclo[0] ?? collect())->isNotEmpty()?1:0)) }}%;">
              Ciclo {{ $c }}
            </th>
          @endfor
        </tr>
      </thead>

      <tbody>
  <tr>
    {{-- Columna "Sin ciclo" --}}
    @if(($porCiclo[0] ?? collect())->isNotEmpty())
      <td>
        @foreach(($porCiclo[0] ?? collect()) as $asig)
          <x-card
            :codigo="$asig->codigo"
            :nombre="$asig->nombre"
            :tipo="$asig->tipo"
            :prerequisito="$asig->prerequisitos"
            :nota="$asig->nota"
            :notas="$notasPorCodigo"
            class="mb-3"
          />
        @endforeach
      </td>
    @endif

    {{-- Ciclos 1..N --}}
    @for ($c = 1; $c <= $totalCiclos; $c++)
      <td>
        @forelse(($porCiclo[$c] ?? collect()) as $asig)
          <x-card
            :codigo="$asig->codigo"
            :nombre="$asig->nombre"
            :tipo="$asig->tipo"
            :prerequisito="$asig->prerequisitos"
            :nota="$asig->nota"
            :notas="$notasPorCodigo"
            class="mb-3"
          />
        @empty
          <span class="text-muted small">—</span>
        @endforelse
      </td>
    @endfor
  </tr>
</tbody>

    </table>
  </div>
</div>
@endsection
