<?php
// application/libraries/Dompdf_gen.php

use Dompdf\Dompdf;
use Dompdf\Options;

class Dompdf_gen {
    public function __construct() {
        require_once APPPATH . '../vendor/autoload.php';

        // Instantiate Dompdf with options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $pdf = new Dompdf($options);
        $CI =& get_instance();
        $CI->dompdf = $pdf;

        // Load Hindi font
        $fontDir = APPPATH . 'fonts/';
        $fontMetrics = $pdf->getFontMetrics();
        $fontMetrics->registerFont($fontDir . 'Lohit-Devanagari.ttf', 'Lohit-Devanagari');
    }
}
