<?php

namespace App\Controllers;

use Goutte\Client;

class CarrerasController extends BaseController
{
    public function index()
    {
        $tipo = $this->request->getGet('tipo');
        $facultad = $this->request->getGet('facultad');
        if ($tipo === 'posgrado') {
            return view('carreras', [
                'carreras' => $this->getPosgradosEstaticos($facultad),
                'tipo' => $tipo,
                'facultad' => $facultad
            ]);
        }


        $url = 'https://carreras.unsl.edu.ar/';


        $filtrosDuracion = ['pregrado', 'grado'];

        if ($tipo && !in_array($tipo, $filtrosDuracion)) {
            $url .= 'tipo-carrera/' . $tipo . '?limit=9999';
        } elseif ($facultad) {
            $url .= 'facultades/' . $facultad . '?limit=9999';
        } else {
            $url .= 'carreras?limit=9999';
        }

        $client = new Client();
        $crawler = $client->request('GET', $url);
        $carreras = [];

        $crawler->filter('.tarjeta-carrera')->each(function ($node) use (&$carreras, $tipo) {
            $nombre = trim($node->filter('.carrera-name')->text());
            $duracionTxt = trim($node->filter('.carrera-anos')->text());


            preg_match('/\d+/', $duracionTxt, $matches);
            $anios = isset($matches[0]) ? (int)$matches[0] : 0;


            if ($tipo === 'pregrado' && $anios > 3) return;
            if ($tipo === 'grado' && ($anios < 4 || $anios > 5)) return;

            $carreras[] = [
                'nombre' => $nombre,
                'duracion' => $duracionTxt,
                'facultad' => trim($node->filter('.carrera-facu')->text()),
                'imagen' => 'https://carreras.unsl.edu.ar' . $node->filter('img')->attr('src'),
                'link' => 'https://carreras.unsl.edu.ar' . $node->getNode(0)->parentNode->getAttribute('href'),
            ];
        });

        return view('carreras', [
            'carreras' => $carreras,
            'tipo' => $tipo,
            'facultad' => $facultad
        ]);
    }

    private function getPosgradosEstaticos($facultadFiltro = null)
    {
        $posgrados = [
            // FCFMYN
            ['nombre' => 'Doctorado en Ciencias de la Computación', 'facultad' => 'FCFMYN', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=D&font=roboto", 'link' => '#'],
            ['nombre' => 'Doctorado en Ciencias Geológicas', 'facultad' => 'FCFMYN', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=G&font=roboto", 'link' => '#'],
            ['nombre' => 'Doctorado en Ciencias Matemáticas', 'facultad' => 'FCFMYN', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=M&font=roboto", 'link' => '#'],
            ['nombre' => 'Doctorado en Física', 'facultad' => 'FCFMYN', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=F&font=roboto", 'link' => '#'],
            ['nombre' => 'Doctorado en Ingeniería Electrónica', 'facultad' => 'FCFMYN', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=E&font=roboto", 'link' => '#'],
            ['nombre' => 'Doctorado en Ingeniería Informática', 'facultad' => 'FCFMYN', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=I&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Calidad de Software', 'facultad' => 'FCFMYN', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=C&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Ciencias de la Computación', 'facultad' => 'FCFMYN', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=CC&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Ciencias de Materiales', 'facultad' => 'FCFMYN', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=CM&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Diseño de Sistemas Electrónicos aplicados a la Agronomía', 'facultad' => 'FCFMYN', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=DSE&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Enseñanza en Escenarios Digitales', 'facultad' => 'FCFMYN', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=EED&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Ingeniería de Software', 'facultad' => 'FCFMYN', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=IS&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Matemática', 'facultad' => 'FCFMYN', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=M&font=roboto",     'link'    =>    '#'],
            ['nombre' =>     'Maestría en Sistemas Embebidos', 'facultad' => 'FCFMYN', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=SE&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Didáctica de la Matemática', 'facultad' => 'FCFMYN', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=DM&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Gestión y Vinculación Tecnológica', 'facultad' => 'FCFMYN', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=GVT&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Enseñanza de la Física', 'facultad' => 'FCFMYN', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=EF&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Simulación Discreta Aplicada a la Planificación Minera', 'facultad' => 'FCFMYN', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=SDAPM&font=roboto", 'link' => '#'],

            // FQBYF
            ['nombre' => 'Doctorado en Biología', 'facultad' => 'FQBYF', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=Biología&font=roboto", 'link' => '#'],
            ['nombre' => 'Doctorado en Bioquímica', 'facultad' => 'FQBYF', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=Bioquímica&font=roboto", 'link' => '#'],
            ['nombre' => 'Doctorado en Farmacia', 'facultad' => 'FQBYF', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=Farmacia&font=roboto", 'link' => '#'],
            ['nombre' => 'Doctorado en Química', 'facultad' => 'FQBYF', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=Química&font=roboto", 'link' => '#'],
            ['nombre' => 'Doctorado en Ciencia y Tecnología de los Alimentos', 'facultad' => 'FQBYF', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=Ciencia+Alimentos&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Inmunología', 'facultad' => 'FQBYF', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=Inmunología&font=roboto",     'link' => '#'],
            ['nombre' => 'Maestría en Química Analítica', 'facultad' => 'FQBYF', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=Química+Analítica&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Bacteriología Clínica', 'facultad' => 'FQBYF', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=Bacteriología+Clínica&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Farmacia Clínica y Atención Farmacéutica', 'facultad' => 'FQBYF', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=Farmacia+Clínica+y+Atención+Farmacéutica&font=roboto", 'link' => '#'],

            // FAPSI
            ['nombre' => 'Doctorado en Psicología', 'facultad' => 'FAPSI', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=Psicología&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Psicología Clínica Cognitivo Integrativa', 'facultad' => 'FAPSI', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=Psicología+Clínica+Cognitivo+Integrativa&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Estudios de Género', 'facultad' => 'FAPSI', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=Estudios+de+Género&font=roboto", 'link' => '#'],

            // FCEJS
            ['nombre' => 'Doctorado en Ciencias Sociales', 'facultad' => 'FCEJS', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=Ciencias+Sociales&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Economía y Negocios', 'facultad' => 'FCEJS', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=Economía+y+Negocios&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Sociedad e Instituciones', 'facultad' => 'FCEJS', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=Sociedad+e+Instituciones&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Abordajes de Problemáticas Sociales', 'facultad' => 'FCEJS', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=Abordajes+de+Problemáticas+Sociales&font=roboto", 'link' => '#'],

            // FICA
            ['nombre' => 'Doctorado en Ciencias de la Ingeniería Química', 'facultad' => 'FICA', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=Ciencias+de+la+Ingeniería+Química&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Control de Convertidores de Potencia', 'facultad' => 'FICA', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=Control+de+Convertidores+de+Potencia&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Calidad de Procesos Industriales', 'facultad' => 'FICA', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=Calidad+de+Procesos+Industriales&font=roboto", 'link' => '#'],

            // FCH
            ['nombre' => 'Doctorado en Educación', 'facultad' => 'FCH', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=Doctorado+en+Educación&font=roboto", 'link' => '#'],
            ['nombre' => 'Maestría en Comunicación Institucional', 'facultad' => 'FCH', 'duracion' => '2 años', 'imagen' => "https://placehold.co/800?text=Maestría+en+Comunicación+Institucional&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Pedagogías de la Formación', 'facultad' => 'FCH', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=Especialización+en+Pedagogías+de+la+Formación&font=roboto", 'link' => '#'],

            // FCS
            ['nombre' => 'Doctorado en Fonoaudiología', 'facultad' => 'FCS', 'duracion' => '5 años', 'imagen' => "https://placehold.co/800?text=Doctorado+en+Fonoaudiología&font=roboto", 'link' => '#'],
            ['nombre' => 'Especialización en Salud Pública y Ambiente', 'facultad' => 'FCS', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=Especialización+en+Salud+Pública+y+Ambiente&font=roboto", 'link' => '#'],

            // FTU
            ['nombre' => 'Especialización en Gestión del Desarrollo e innovación Turística', 'facultad' => 'FTU', 'duracion' => '1.5 años', 'imagen' => "https://placehold.co/800?text=Especialización+en+Gestión+del+Desarrollo+e+innovación+Turística&font=roboto", 'link' => '#'],
        ];

        if ($facultadFiltro) {
            return array_values(array_filter($posgrados, function ($p) use ($facultadFiltro) {
                return strtolower($p['facultad']) === strtolower($facultadFiltro);
            }));
        }
        return $posgrados;
    }
}
