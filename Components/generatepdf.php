<?php
// Include the TCPDF library
@require_once('../Components/TCPDF/tcpdf.php');

// Start capturing output
ob_start();

// Create a new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Set document information
$pdf->SetCreator("OJT Coordinator");
$pdf->SetAuthor("OJT Placement Form");
$pdf->SetTitle('Placement Form');
$pdf->SetSubject('Placement Form PDF');
$pdf->SetKeywords('OJT, PDF, Placement Form');

@include_once('./PlacementForm.php');

// Get the captured output
$html = ob_get_clean();

// Add a page
$pdf->AddPage();

// Convert the HTML into PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF as a file named "PlacementForm.pdf" and force download
$pdf->Output('PlacementForm.pdf', 'D');

?>