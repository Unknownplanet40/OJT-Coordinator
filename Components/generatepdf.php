<?php
session_start();

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

// Check if the GD extension is installed
if (!extension_loaded('gd')) {
    // The GD extension is not installed
    header('Location: ../ErrorPage.php?error=1000');
} else {
    // The GD extension is installed
    // Continue generating the PDF document
    // Add a page
    $pdf->AddPage();

    // Convert the HTML into PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->setY(230);
    //signature

    $sql = "SELECT * FROM tbl_admin";
    $result = mysqli_query($conn, $sql);

    // Store the names in an array
    $names = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $names[] = $row['name'];
    }

    // Randomly select a name from the array
    $randomName = $names[array_rand($names)];

    $pdf->Cell(80, 0, '___________________________', 0, 1, 'C');
    $pdf->Cell(80, 0, $_SESSION['GlobalName'], 0, 1, 'C');
    $pdf->Cell(80, 0, 'Trainee', 0, 1, 'C');

    $pdf->setY(260);

    $pdf->Cell(80, 0, '___________________________', 0, 1, 'C');
    $pdf->Cell(80, 0, $randomName, 0, 1, 'C');
    $pdf->Cell(80, 0, 'OJT Coordinator', 0, 1, 'C');



    // Output the PDF as a file named "PlacementForm.pdf" and force download
    $pdf->Output('PlacementForm.pdf', 'D');
}


?>