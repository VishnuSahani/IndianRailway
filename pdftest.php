<script src="../jsPdf/font/TiroDevanagariHindi-Regular.ttf"></script>
<script>
  // Load Hindi font
  var hindiFont = new FontFace("TiroDevanagariHindi", "../jsPdf/font/TiroDevanagariHindi-Regular.ttf)");

  // Wait for the font to be loaded before proceeding
  hindiFont.load().then(function () {
    // Initialize jsPDF with the loaded font
    var pdf = new jsPDF();
    pdf.addFont("Devanagari", "Devanagari", "normal");

    // Use the font in your document
    pdf.setFont("Devanagari");
    pdf.text("आपका पाठ यहाँ है", 10, 10);

    // Save or display the PDF
    pdf.save("output.pdf");
  });
</script>
