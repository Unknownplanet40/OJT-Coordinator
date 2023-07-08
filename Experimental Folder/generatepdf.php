<?php
// Include the TCPDF library
@require_once('../Components/TCPDF/tcpdf.php');

// Create a new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Placement Form');
$pdf->SetSubject('Placement Form PDF');
$pdf->SetKeywords('TCPDF, PDF, placement form');

// Start capturing output
ob_start();

// Include the external PHP template
//V1
//include('../Components/PlacementFormPDF.html');
//V2
include('../Components/PlacementFormPDF copy.html');

// Get the captured output
$html = ob_get_clean();

// Add a page
$pdf->AddPage();

// Convert the HTML into PDF
$pdf->writeHTML($html, true, false, true, false, '');
// Output the PDF as a file named "PlacementForm.pdf" and force download
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));
 
    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
 
    return $key;
}
$pdf->Output('PlacementForm'.random_string(5).'.pdf', 'D');
