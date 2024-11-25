<?php

use Dompdf\Dompdf;

class GenerarPDF
{
    public static function crearPDF(string $contenido, string $nombreArchivo): string
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($contenido);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $rutaArchivo = __DIR__ . "/../$nombreArchivo.pdf";
        file_put_contents($rutaArchivo, $dompdf->output());

        return "PDF generado: $rutaArchivo";
    }
}
