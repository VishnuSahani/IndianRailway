<?php

//pdf.php

// require 'dompdf/autoload.inc.php';
// require 'dompdf_2/autoload.inc.php';

// use Dompdf\Dompdf;

// class Pdf extends Dompdf
// {
// 	public function __construct()
// 	{
// 		parent::__construct();
// 	}
// }

// Include domPDF library
// require_once 'path/to/dompdf/autoload.inc.php';
require_once 'dompdf_2/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
// Load the custom font for Hindi characters
// $font = 'path/to/font/NotoSans-Regular.ttf'; // Replace with your font path
$font = 'font/TiroDevanagariHindi-Regular.ttf'; // Replace with your font path
$fontFamily = 'noto_sans'; // Font family name (you can use any name)

// HTML content with Hindi and English text
$html = '<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>HTML to PDF with Hindi and English</title>
        <style>
            /* Add your CSS styles here */
            body {
                font-family: ' . $fontFamily . ', sans-serif;
            }
        </style>
    </head>
    <body>
        <h1>Hello, नमस्ते (Namaste)!</h1>
        <p>This is a sample PDF generated using domPDF with text in English and Hindi - यह हिंदी में भी है।</p>
    </body>
</html>';
$options = new Options();
$options->set('defaultFont', 'path/to/font/NotoSans-Regular.ttf'); // Replace with your font path supporting Hindi characters

// Create domPDF instance
$dompdf = new Dompdf($options);


// Load HTML content
$dompdf->loadHtml($html);

// (Optional) Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (either download or display in browser)
$dompdf->stream('output.pdf', array('Attachment' => 0));



?>