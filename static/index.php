
        <?php
        require 'vendor/autoload.php';

        use Goutte\Client;

        $tipo = $_GET['tipo'] ?? null;
        $facultad = $_GET['facultad'] ?? null;

        $url = 'https://carreras.unsl.edu.ar/';

        if ($tipo && $facultad) {
            $tipo = null; // prioriza facultad
        }
        if ($tipo) {
            $url .= 'tipo-carrera/' . $tipo . '?limit=9999';
        } elseif ($facultad) {
            $url .= 'facultades/' . $facultad . '?limit=9999';
        } else {
            $url .= 'carreras?limit=9999';
        }

        $client = new Client();
        $crawler = $client->request('GET', $url);

        $baseUrl = 'http://10.230.5.252/Pruebas/soyunsl/';
        $logos = [
            'fqbyf'   => $baseUrl . 'assets/img/facultades/unsl/fqbyf.png',
            'fcs'     => $baseUrl . 'assets/img/facultades/unsl/fcs.png',
            'fcejs'   => $baseUrl . 'assets/img/facultades/unsl/fcejs.png',
            'fcfmyn'  => $baseUrl . 'assets/img/facultades/unsl/fcfmyn.png',
            'fapsi'   => $baseUrl . 'assets/img/facultades/unsl/fapsi.png',
            'fch'     => $baseUrl . 'assets/img/facultades/unsl/fch.png',
            'fica'    => $baseUrl . 'assets/img/facultades/unsl/fica.png',
            'ftu'     => $baseUrl . 'assets/img/facultades/unsl/ftu.png',
            'ipau'    => $baseUrl . 'assets/img/facultades/unsl/ipau.png',
        ];

        $defaultLogo = $baseUrl . 'assets/img/facultades/default.png';


        $carreras = [];
        $crawler->filter('.tarjeta-carrera')->each(function ($node) use (&$carreras) {
            $nombre = trim($node->filter('.carrera-name')->text());
            $duracion = trim($node->filter('.carrera-anos')->text());
            $facultad = trim($node->filter('.carrera-facu')->text());
            $imagen = $node->filter('img')->attr('src');
            $parentA = $node->getNode(0)->parentNode;
            $enlace = $parentA->getAttribute('href');


            $slug = strtolower(preg_replace('/[^a-z0-9]/', '', str_replace(' ', '', $facultad)));

            $carreras[] = [
                'nombre'   => $nombre,
                'duracion' => $duracion,
                'facultad' => $facultad,
                'imagen'   => 'https://carreras.unsl.edu.ar' . $imagen,
                'link'     => 'https://carreras.unsl.edu.ar' . $enlace,
                'slug'     => $slug,
            ];
        });
        ?>
