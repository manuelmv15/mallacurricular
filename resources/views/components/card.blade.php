@props([
  'codigo' => '',
  'nombre' => '',
  'tipo' => 'Obligatoria',      // "Obligatoria" | "Electiva"
  'prerequisito' => [],         // array o "A,B,C"
  'nota' => null,               // float|null
  'notas' => [],                // mapa: ['COD' => nota|null]
])

@once
  <style>
    .elect-card              { border-color:#c6a27e!important; }
    .elect-card .card-header { background:#f5e6d3; color:#4e342e; }
    .badge-elect             { background:#e8d7c7; color:#4e342e; }

    .oblig-card              { border-color:#0d6efd!important; }
    .oblig-card .card-header { background:#0d6efd; color:#fff; }
    .badge-oblig             { background:rgba(13,110,253,.15); color:#0d6efd; }

    .blocked-card            { border-color:#c8c8c8!important; }
    .blocked-card .card-header{ background:#e9ecef; color:#6c757d; }
    .badge-blocked           { background:#f0f1f2; color:#6c757d; border:1px solid #dcdcdc; }
  </style>
@endonce
@php
  // ¿tiene nota esta materia?
  $hasNota = isset($nota) && floatval($nota) > 0;

  // ¿algún prerrequisito NO tiene nota?
  $blocked = false;
  if (!empty($prerequisito) && !$hasNota) {
      foreach ($prerequisito as $p) {
          $pn = $notas[$p] ?? null;
          if ($pn === null || floatval($pn) <= 0) { $blocked = true; break; }
      }
  }

  // ¿es obligatoria?
  $isOblig = strcasecmp($tipo ?? '', 'Obligatoria') === 0;

  // clases de estilo
  $baseClass  = $blocked ? 'blocked-card' : ($isOblig ? 'oblig-card' : 'elect-card');
  $badgeClass = $blocked ? 'badge-blocked' : ($isOblig ? 'badge-oblig' : 'badge-elect');
@endphp


<div {{ $attributes->merge(['class' => 'card shadow-sm mb-3 '.$baseClass]) }}>
  <div class="card-header d-flex align-items-center gap-2">
    <span class="badge rounded-pill {{ $badgeClass }}">
      {{ $blocked ? 'Bloqueada' : $tipo }}
    </span>
    <small class="text-uppercase fw-semibold opacity-75">{{ $codigo }}</small>

    @if($hasNota)
      <span class="ms-auto badge text-bg-success">Nota: {{ number_format($nota,2) }}</span>
    @endif
  </div>

  <div class="card-body">
    <h5 class="card-title mb-2">{{ $nombre }}</h5>

    <div class="card-text">
      @if(empty($prerequisito))
        <span class="text-muted">Sin prerrequisitos</span>
      @else
        <div class="d-flex flex-wrap gap-2">
          @foreach($prerequisito as $p)
            @php $pn = $notas[$p] ?? null; @endphp
            <span class="badge {{ ($pn===null || floatval($pn)<=0) ? 'badge-blocked' : 'bg-light text-dark border' }}">
              {{ $p }}
            </span>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</div>
