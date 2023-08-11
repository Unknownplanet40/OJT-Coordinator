<?php

@require 'vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = file_get_contents("Evaluation.php");

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream("playerofcode",array("Attachment"=>1));
?>
