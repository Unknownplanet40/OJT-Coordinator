<?php
// Include the TCPDF library
@require_once('./TCPDF/tcpdf.php');

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
@include_once('./PlacementFormPDF.html');

// Get the captured output
$html = ob_get_clean();

// Add a page
$pdf->AddPage();

// Convert the HTML into PDF
$pdf->writeHTML($html, true, false, true, false, '');
// Output the PDF as a file named "PlacementForm.pdf" and force download
$pdf->Output('PlacementForm.pdf', 'D');
?>
