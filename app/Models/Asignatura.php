<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Asignatura.php
class Asignatura extends Model
{
    // app/Models/Asignatura.php
    protected $fillable = ['codigo', 'nombre', 'tipo', 'nota', 'prerequisitos', 'ciclo'];

    protected $casts = ['prerequisitos' => 'array', 'nota' => 'decimal:2'];
}
