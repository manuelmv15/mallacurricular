<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function index()
    {
        $totalCiclos = 10;

        $asignaturas = Asignatura::select('id', 'codigo', 'nombre', 'tipo', 'prerequisitos', 'ciclo', 'nota')
            ->orderBy('ciclo')
            ->orderBy('codigo')
            ->get()
            ->map(function ($a) {
                // Normaliza prerequisitos a array
                if (is_array($a->prerequisitos)) {
                    // ok
                } elseif (is_string($a->prerequisitos)) {
                    // intenta JSON -> si no, coma-separado -> si vacío, []
                    $decoded = json_decode($a->prerequisitos, true);
                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                        $a->prerequisitos = $decoded;
                    } else {
                        $a->prerequisitos = strlen(trim($a->prerequisitos))
                            ? array_map('trim', explode(',', $a->prerequisitos))
                            : [];
                    }
                } else {
                    $a->prerequisitos = [];
                }

                // Asegura tipos
                $a->ciclo = $a->ciclo ? (int)$a->ciclo : 0;
                $a->nota  = is_null($a->nota) ? null : (float)$a->nota;

                return $a;
            });

        // Agrupa TODO por ciclo (0 = “Sin ciclo”)
        $porCiclo = $asignaturas->groupBy(fn($a) => $a->ciclo)->sortKeys();

        // Mapa de notas por código para que el componente pueda validar prerrequisitos
        $notasPorCodigo = Asignatura::get(['codigo','nota'])
    ->pluck('nota','codigo')
    ->map(fn($n) => is_null($n) ? null : (float)$n)
    ->toArray();

        return view('pages.home', compact('porCiclo', 'totalCiclos', 'notasPorCodigo'));
    }


    public function edit()
    {
        $asignaturas = Asignatura::select('id', 'codigo', 'nombre', 'tipo', 'ciclo', 'nota')
            ->orderBy('ciclo')->orderBy('codigo')->get();

        return view('pages.notas', compact('asignaturas'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'notas'   => 'array',
            'notas.*' => 'nullable|numeric|min:0|max:10', // ajusta max si usas escala 0–100
        ]);

        DB::transaction(function () use ($data) {
            foreach (($data['notas'] ?? []) as $id => $nota) {
                Asignatura::where('id', $id)->update([
                    'nota' => ($nota === '' ? null : $nota),
                ]);
            }
        });

        return back()->with('status', 'Notas guardadas correctamente.');
    }
}
