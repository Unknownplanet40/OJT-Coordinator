<?php
@require '../Components/DOMPDF/vendor/autoload.php';
ini_set('memory_limit', '512M');

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = file_get_contents("EvalPDF.php");

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$dompdf->stream("Evaluation",array("Attachment"=>1));
?>
