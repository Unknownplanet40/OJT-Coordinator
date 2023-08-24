<?php
session_start();
date_default_timezone_set('Asia/Manila');

@require_once("../../Components/TCPDF/tcpdf.php");

class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = K_PATH_IMAGES . 'tcpdf_logo.jpg';
        $this->Image($image_file, 30, 15, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->SetFont('helvetica', 'R', 1);
        //color to white
        $this->SetTextColor(255, 255, 255);
        $this->Cell(0, 0, 'This is just a Seperator', 0, 1, 'C', 0);

        // ---------------------------------------------------------
        // Set font and color for the text
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('helvetica', 'R', 10);
        $this->Cell(0, 0, 'Republic of the Philippines', 0, 1, 'C', 0);
        $this->SetFont('helvetica', 'B', 16);
        $this->Cell(0, 0, 'CAVITE STATE UNIVERSITY', 0, 1, 'C', 0);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(0, 0, 'Imus Campus', 0, 1, 'C', 0);
        $this->SetFont('helvetica', 'R', 8);
        $this->Cell(0, 0, 'Cavite Civic Center, Palico IV, Imus, Cavite', 0, 1, 'C', 0);
        $this->SetFont('helvetica', 'R', 8);
        $this->Cell(0, 0, '(046) 471-6770 / (460) 471-6607', 0, 1, 'C', 0);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(0, 0, 'cvsu-imus.edu.ph', 0, 1, 'C', 0, 'https://cvsu-imus.edu.ph/', 0, false, 'T', 'M');
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // date and time generated
        $this->Cell(0, 10, 'Date Generated: ' . date("M d, Y - h:i A"), 0, false, 'L', 0, '', 0, false, 'T', 'M');
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    public function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line) {
            $data[] = explode(';', chop($line));
        }
        return $data;
    }

    public function Info($file)
    {
        //Score;Date;Name

        // Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line) {
            $data[] = explode(';', chop($line));
        }
        return $data;
    }

    // display score, date and name

    public function display($file)
    {
        $data = $this->Info($file);
        $this->SetY(190);
        $this->setTextColor(0, 0, 0);
        $this->SetFont('helvetica', 'R', 12);
        $this->Cell(0, 0, $data[3][0] . ': ' . $data[3][1], 0, 1, 'L', 0); // Evaluation for: Name
        $this->Cell(0, 0, $data[0][0] . ': ' . $data[0][1], 0, 1, 'L', 0); // Evaluated by: Name
        $this->Cell(0, 0, $data[1][0] . ': ' . $data[1][1], 0, 1, 'L', 0); // Date Taken: Date
        $this->Cell(0, 0, $data[2][0] . ': ' . $data[2][1], 0, 1, 'L', 0); // Score: Score
        $this->Ln();
        $this->Cell(0, 0, $data[4][0] . ': ', 0, 1, 'L', 0); // Feedback:
        // after 4 lines, add a line break
        // display feedback
        for ($i = 1; $i < count($data[4]); $i++) {
            $this->Cell(0, 0, $data[4][$i], 0, 1, 'C', 0);
        }
    }



    // Colored table
    public function ColoredTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(62, 163, 76);
        $this->SetTextColor(255);
        $this->SetDrawColor(62, 163, 76);
        $this->SetLineWidth(0.3);
        $this->SetFont('helvetica', 'B');

        // Header
        $w = array(140, 8, 8, 8, 8, 8);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        $count = 0;
        foreach ($data as $row) {
            // limit $row[0] to 70 characters
            // if exceed, add ... at the end
            if (strlen($row[0]) > 70) {
                $row[0] = substr($row[0], 0, 70) . '...';
            }
            // add break after 3,7,14 rows
            if ($count == 3 || $count == 7 || $count == 14) {
                $this->SetFillColor(62, 163, 76);
                $this->Cell(array_sum($w), 0, '', 'TBRL', 1, 'L', 1);
            }
            $this->SetFillColor(224, 235, 255);
            $this->SetFont('helvetica', 'R', 12);
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->SetFont('helvetica', 'B', 14);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, $row[3], 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, $row[4], 'LR', 0, 'C', $fill);
            $this->Cell($w[5], 6, $row[5], 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
            // add 1 to count
            $count++;
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T', 1, 'C', 0);
    }
}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CvSU-Imus');
$pdf->SetTitle('Evaluation Report');
$pdf->SetSubject('Evaluation Report');
$pdf->SetKeywords('Evaluation, Report, PDF, TCPDF');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();
$pdf->SetY(50);

// column titles
$header = array('Question', '1', '2', '3', '4', '5');

$data1 = $pdf->LoadData($_SESSION['GlobalUsername'] . '_EvalData.txt');

$pdf->ColoredTable($header, $data1);
$pdf->display($_SESSION['GlobalUsername'] . '_EvalInfo.txt');

//get name then add to new variable
$name = $_SESSION['GlobalName'] . ' Evaluation Report.pdf';

// ---------------------------------------------------------

//Close and output PDF document
// I - send to browser, D - download file, F - save file locally
$pdf->Output($name, 'D');






?>