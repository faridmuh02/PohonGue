<?php

    error_reporting(0);

    $pdf = new FPDF('L','mm','Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0,7,'TABEL DATA POHON POHON GUE',0,1,'C');
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial', 'B', 10);

    $pdf->Cell(10,6,'NO',1,0,'C');
    $pdf->Cell(30,6,'NAMA POHON',1,0,'C');
    $pdf->Cell(30,6,'BUAH',1,0,'C');
    $pdf->Cell(30,6,'STOK',1,0,'C');
    $pdf->Cell(30,6,'ID PEMILIK',1,0,'C');
    $pdf->Cell(30,6,'HARGA',1,0,'C');
    $pdf->Cell(100,6,'DESKRIPSI',1,1,'C');
    $pdf->SetFont('Arial', '', 10);

    $nomor = 1;
    foreach($user as $u)
    {

        $pdf->Cell(10,15,$nomor++,1,0,'C');
        $pdf->Cell(30,15,$u->nama,1,0,'C');
        $pdf->Cell(30,15,$u->buah,1,0,'C');
        $pdf->Cell(30,15,$u->stok,1,0,'C');
        $pdf->Cell(30,15,$u->id_pemilik,1,0,'C');
        $pdf->Cell(30,15,$u->harga,1,0,'C');
        $pdf->Cell(100,15,$u->deskripsi,1,1,'C');
        $pdf->SetFont('Arial', '', 10);
    }
    

    $pdf->Output();

?>