<?php
// require('../jsPdf/pdf.php');
// require_once '../jsPdf/pdf.php';
require_once('../jsPdf/pdf.php');

// echo $html = $_POST['pdf_html'];

$html = '<h1>Hello PDF - बाधा वोल्टेज (>80 वोल्ट)</h1>';
$pdf = new Pdf();

$pdf->loadHtml($html, 'UTF-8');
$pdf->render();
ob_end_clean();
//$pdf->stream($_GET["id"] . '.pdf', array( 'Attachment'=>1 ));
$pdf->stream('test.pdf', array( 'Attachment'=>false ));
exit(0)

?>