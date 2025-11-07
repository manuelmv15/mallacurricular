<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asignatura;
class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            // ---- Ciclo 1
            ['codigo'=>'MEX155','nombre'=>'Métodos Experimentales','tipo'=>'Obligatoria','nota'=>6,3,'prerequisitos'=>[],'ciclo'=>1],
            ['codigo'=>'MAT155','nombre'=>'Matemática I','tipo'=>'Obligatoria','nota'=>7.2,'prerequisitos'=>[],'ciclo'=>1],
            ['codigo'=>'PSS155','nombre'=>'Psicología Social','tipo'=>'Obligatoria','nota'=>8.7,'prerequisitos'=>[],'ciclo'=>1],
            ['codigo'=>'ILI155','nombre'=>'Introducción a la Informática','tipo'=>'Obligatoria','nota'=>6.9,'prerequisitos'=>[],'ciclo'=>1],

            // ---- Ciclo 2
            ['codigo'=>'HSC155','nombre'=>'Historia Social y Económica de El Salvador y C.A.','tipo'=>'Obligatoria','nota'=>7.6,'prerequisitos'=>['PSS155'],'ciclo'=>2],
            ['codigo'=>'PRN155','nombre'=>'Programación I','tipo'=>'Obligatoria','nota'=>7.3,'prerequisitos'=>['ILI155'],'ciclo'=>2],
            ['codigo'=>'MSM155','nombre'=>'Manejo de Software para Microcomputadoras','tipo'=>'Obligatoria','nota'=>6.8,'prerequisitos'=>['ILI155'],'ciclo'=>2],
            ['codigo'=>'MAT255','nombre'=>'Matemática II','tipo'=>'Obligatoria','nota'=>6.8,'prerequisitos'=>['MAT155'],'ciclo'=>2],
            ['codigo'=>'FIS155','nombre'=>'Física I','tipo'=>'Obligatoria','nota'=>6.4,'prerequisitos'=>['MAT155','MEX155','MAT255'],'ciclo'=>2],


            // ---- Ciclo 3
            ['codigo'=>'PRN255','nombre'=>'Programación II','tipo'=>'Obligatoria','nota'=>6,'prerequisitos'=>['PRN155'],'ciclo'=>3],
            ['codigo'=>'MAT355','nombre'=>'Matemática III','tipo'=>'Obligatoria','nota'=>7.2,'prerequisitos'=>['MAT255'],'ciclo'=>3],
            ['codigo'=>'FIS255','nombre'=>'Física II','tipo'=>'Obligatoria','nota'=>7.4,'prerequisitos'=>['FIS155','MAT255'],'ciclo'=>3],
            ['codigo'=>'PES155','nombre'=>'Probabilidad y Estadística','tipo'=>'Obligatoria','nota'=>7.1,'prerequisitos'=>['MAT255'],'ciclo'=>2],
            ['codigo'=>'FDE155','nombre'=>'Fundamentos de Economía','tipo'=>'Obligatoria','nota'=>6,'prerequisitos'=>['HSC155','MAT255'],'ciclo'=>3],

            // ---- Ciclo 4
            ['codigo'=>'PRN355','nombre'=>'Programación III','tipo'=>'Obligatoria','nota'=>6.1,'prerequisitos'=>['PRN255'],'ciclo'=>4],
            ['codigo'=>'MEP155','nombre'=>'Métodos Probabilísticos','tipo'=>'Obligatoria','nota'=>7.4,'prerequisitos'=>['PES155'],'ciclo'=>3],
            ['codigo'=>'MAT455','nombre'=>'Matemática IV','tipo'=>'Obligatoria','nota'=>6.1,'prerequisitos'=>['MAT355'],'ciclo'=>4],
            ['codigo'=>'FIS355','nombre'=>'Física III','tipo'=>'Obligatoria','nota'=>7.8,'prerequisitos'=>['FIS255'],'ciclo'=>4],
            ['codigo'=>'ESD155','nombre'=>'Estructura de Datos','tipo'=>'Obligatoria','nota'=>6,'prerequisitos'=>['PRN255'],'ciclo'=>4],

            // ---- Ciclo 5
            ['codigo'=>'ANS155','nombre'=>'Análisis Numérico','tipo'=>'Obligatoria','nota'=>6.1,'prerequisitos'=>['MAT455','PRN155'],'ciclo'=>5],
            ['codigo'=>'HDP155','nombre'=>'Herramientas de Productividad','tipo'=>'Obligatoria','nota'=>6.4,'prerequisitos'=>['ESD155','MSM155'],'ciclo'=>5],
            ['codigo'=>'SYP155','nombre'=>'Sistemas y Procedimientos','tipo'=>'Obligatoria','nota'=>6.4,'prerequisitos'=>['PRN355'],'ciclo'=>5],
            ['codigo'=>'MOP155','nombre'=>'Métodos de Optimización','tipo'=>'Obligatoria','nota'=>6.5,'prerequisitos'=>['MEP155'],'ciclo'=>5],
            ['codigo'=>'SDU155','nombre'=>'Sistemas Digitales I','tipo'=>'Obligatoria','nota'=>8.2,'prerequisitos'=>['FIS355','PRN155'],'ciclo'=>5],

            // ---- Ciclo 6
            ['codigo'=>'IEC155','nombre'=>'Ingeniería Económica','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['PES155'],'ciclo'=>6],
            ['codigo'=>'SIC155','nombre'=>'Sistemas Contables','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['HDP155'],'ciclo'=>6],
            ['codigo'=>'TSI155','nombre'=>'Teoría de Sistemas','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['SYP155'],'ciclo'=>6],
            ['codigo'=>'ARC155','nombre'=>'Arquitectura de Computadoras','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['ANS155','SDU155'],'ciclo'=>6],

            // ---- Ciclo 7
            ['codigo'=>'DSI155','nombre'=>'Diseño de Sistemas I','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['SIC155','TSI155'],'ciclo'=>7],
            ['codigo'=>'TAD155','nombre'=>'Teoría Administrativa','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['SIC155'],'ciclo'=>7],
            ['codigo'=>'MIP155','nombre'=>'Microprogramación','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['ARC155'],'ciclo'=>7],

            // ---- Ciclo 8
            ['codigo'=>'COS155','nombre'=>'Comunicaciones I','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['MIP155'],'ciclo'=>8],
            ['codigo'=>'SIO155','nombre'=>'Sistemas Operativos','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['MIP155'],'ciclo'=>8],
            ['codigo'=>'ANF155','nombre'=>'Análisis Financiero','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['IEC155','TAD155'],'ciclo'=>8],

            // ---- Ciclo 9
            ['codigo'=>'DSI255','nombre'=>'Diseño de Sistemas II','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['DSI155'],'ciclo'=>9],
            ['codigo'=>'BAD155','nombre'=>'Bases de Datos','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['DSI255','SIO155'],'ciclo'=>9],
            ['codigo'=>'SGI155','nombre'=>'Sistemas de Información Gerencial','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['DSI255'],'ciclo'=>9],
            ['codigo'=>'RHU155','nombre'=>'Recursos Humanos','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['TAD155'],'ciclo'=>9],
            ['codigo'=>'LPR155','nombre'=>'Legislación Profesional','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>[],'ciclo'=>9],

            // ---- Ciclo 10
            ['codigo'=>'API155','nombre'=>'Administración de Proyectos Informáticos','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['ANF155','SGI155'],'ciclo'=>10],
            ['codigo'=>'ACC155','nombre'=>'Administración de Centros de Cómputo','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['BAD155','RHU155','SGI155'],'ciclo'=>10],
            ['codigo'=>'CPR155','nombre'=>'Consultoría Profesional','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>[],'ciclo'=>10],
            ['codigo'=>'QTR155','nombre'=>'Química Técnica','tipo'=>'Obligatoria','nota'=>null,'prerequisitos'=>['MEX155'],'ciclo'=>10],

            // ===== Electivas (con ciclo sugerido según tu maqueta) =====
            ['codigo'=>'TOO155','nombre'=>'Tecnología Orientada a Objetos','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['PRN355'],'ciclo'=>6],
            ['codigo'=>'TPI155','nombre'=>'Técnicas de Programación Para Internet','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['HDP155','PRN355'],'ciclo'=>6],
            ['codigo'=>'TDS155','nombre'=>'Técnicas de Simulación','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['MOP155','TSI155'],'ciclo'=>7],
            ['codigo'=>'SGG155','nombre'=>'Sistemas de Información Geográfica','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['MOP155','TSI155'],'ciclo'=>7],
            ['codigo'=>'ADC155','nombre'=>'Análisis de Costos Informáticos','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>[],'ciclo'=>7],
            ['codigo'=>'AEC155','nombre'=>'Análisis Estadístico por Computadoras','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>[],'ciclo'=>7],
            ['codigo'=>'POO155','nombre'=>'Programación Orientada a Objetos','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>[],'ciclo'=>7],
            ['codigo'=>'PDM155','nombre'=>'Programación para Dispositivos Móviles','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['HDP155','PRN355'],'ciclo'=>7],
            ['codigo'=>'IPI155','nombre'=>'Introducción a la Programación en Internet','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>[],'ciclo'=>8],
            ['codigo'=>'CET155','nombre'=>'Comercio Electrónico','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['DSI155','TPI155'],'ciclo'=>8],
            ['codigo'=>'TCD155','nombre'=>'Tecnología de la Comunicación de Datos','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>[],'ciclo'=>8],
            ['codigo'=>'IGF155','nombre'=>'Ingeniería de Software','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['DSI155'],'ciclo'=>8],
            ['codigo'=>'PCO155','nombre'=>'Protocolos de Comunicaciones','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['COS155'],'ciclo'=>9],
            ['codigo'=>'SIF155','nombre'=>'Seguridad Informática','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['COS155','DSI255','SIO155'],'ciclo'=>9],
            ['codigo'=>'PDD155','nombre'=>'Programación 3D','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>[],'ciclo'=>9],
            ['codigo'=>'AUS155','nombre'=>'Auditoría de Sistemas','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['SGI155'],'ciclo'=>10],
            ['codigo'=>'IBD155','nombre'=>'Implementación de Bases de Datos','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['BAD155'],'ciclo'=>10],
            ['codigo'=>'COS255','nombre'=>'Comunicaciones II','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['COS155'],'ciclo'=>10],
            ['codigo'=>'AGR155','nombre'=>'Algoritmos Gráficos','tipo'=>'Electiva','nota'=>null,'prerequisitos'=>['TSI155'],'ciclo'=>7],
        ];
        foreach ($data as $row) {
            Asignatura::updateOrCreate(
                ['codigo' => $row['codigo']],
                $row
            );
        }
    }
}
