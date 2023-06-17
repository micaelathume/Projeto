<?php
// Headers
header('Content-type: application/pdf');

include_once '../../config/Database.php';
include_once '../../model/Certificado.php';

require('../../fpdf/fpdf.php');

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$cert = new Certificado($db);

// Get ID
$cert->usuario = isset($_GET['usuario']) ? $_GET['usuario'] : die();
$cert->evento = isset($_GET['evento']) ? $_GET['evento'] : die();

// Get
$cert->read_id();

$nome = 'certificado' . $cert->usuario . $cert->evento . '.pdf';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

$str = $cert->conteudo;
$pdf->Multicell(160, 10, iconv(mb_detect_encoding($str), 'windows-1252', $str));
$pdf->Multicell(160, 10, '');
$str = 'Chave de autenticação: ';
$pdf->Multicell(160, 10, iconv(mb_detect_encoding($str), 'windows-1252', $str));
$str = $cert->codigo;
$pdf->Multicell(160, 10, iconv(mb_detect_encoding($str), 'windows-1252', $str));

return $pdf->Output(null, 'certificado-' . time() . '.pdf');

// Bad method
http_response_code(405);
exit();