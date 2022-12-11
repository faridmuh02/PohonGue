<?php

    error_reporting(0);

    $pdf = new FPDF('L','mm','Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0,7,'TABEL DATA PETANI POHON GUE',0,1,'C');
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(10,6,'NO',1,0,'C');
    $pdf->Cell(30,6,'NAMA',1,0,'C');
    $pdf->Cell(60,6,'DESKRIPSI',1,0,'C');
    $pdf->Cell(60,6,'ALAMAT',1,0,'C');
    $pdf->Cell(60,6,'EMAIL',1,0,'C');
    $pdf->Cell(30,6,'NO HP',1,1,'C');
    $pdf->SetFont('Arial', '', 10);

    $nomor = 1;
    foreach($user as $u)
    {

        $pdf->Cell(10,15,$nomor++,1,0,'C');
        $pdf->Cell(30,15,$u->nama,1,0,'C');
        $pdf->Cell(60,15,$u->deskripsi,1,0,'C');
        $pdf->Cell(60,15,$u->alamat,1,0,'C');
        $pdf->Cell(60,15,$u->email,1,0,'C');
        $pdf->Cell(30,15,$u->no_hp,1,1,'C');
        $pdf->SetFont('Arial', '', 10);
    }
    

    $pdf->Output();

?>