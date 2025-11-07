<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public string $codigo;
    public string $nombre;
    public string $tipo;
    /** @var string[] */
    public array  $prerequisito;

    /** nota de la materia */
    public $nota; // float|null

    /** mapa de notas por código: ['MAT155'=>7.0, 'PRN155'=>null, ...] */
    public array $notas = [];

    /** flags calculados para la vista */
    public bool $isOblig = true;
    public bool $hasNota = false;
    public bool $blocked = false;

    /**
     * @param array|string|null $prerequisito
     */
    public function __construct(
        string $codigo = '',
        string $nombre = '',
        string $tipo   = 'Obligatoria',
        $prerequisito  = [],
        $nota = null,
        array $notas = []
    ) {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->tipo   = $tipo;
        $this->nota   = $nota;
        $this->notas  = $notas;

        // normaliza prerrequisitos
        if (is_string($prerequisito)) {
            $prerequisito = strlen($prerequisito) ? array_map('trim', explode(',', $prerequisito)) : [];
        } elseif (!is_array($prerequisito)) {
            $prerequisito = [];
        }
        $this->prerequisito = $prerequisito;

        // ---- calcula flags que usará la vista
        $this->isOblig = strcasecmp($this->tipo, 'Obligatoria') === 0;
        $this->hasNota = $this->nota !== null && floatval($this->nota) > 0;
        $this->blocked = !$this->hasNota && $this->hayPrereqsSinNota();
    }

    private function hayPrereqsSinNota(): bool
    {
        if (empty($this->prerequisito)) return false;
        foreach ($this->prerequisito as $cod) {
            $n = $this->notas[$cod] ?? null;
            if ($n === null || floatval($n) <= 0) return true;
        }
        return false;
    }

    public function render()
    {
        return view('components.card');
    }
}
