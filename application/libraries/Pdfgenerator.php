<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// Al requerir el autoload, cargamos todo lo necesario para trabajar
require_once APPPATH . "third_party/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

class Pdfgenerator {

// por defecto, usaremos papel A4 en vertical, salvo que digamos otra cosa al momento de generar un PDF
    public function generate($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = "portrait") {
        $dompdf = new DOMPDF();
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        file_put_contents( "application/files/".$filename.".pdf", $dompdf->output());
//        if ($stream) {
//            // "Attachment" => 1 har� que por defecto los PDF se descarguen en lugar de presentarse en pantalla.
//            //$dompdf->stream($filename . ".pdf", array("Attachment" => 1));
//            file_put_contents( "application/files/".$filename.".pdf", $dompdf->output());
//        } else {
//            file_put_contents( "application/files/".$filename.".pdf", $dompdf->output());
//            //return $dompdf->output();
//        }
        
        if (file_exists("application/files/".$filename.".pdf")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>