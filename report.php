<?php
require("base.php");
require_once("$BASE_DIR/common.php");
require_once("$BASE_DIR/classes/view/CustomReportView.php");

$pdf = new PDFCustomReport('en');
$page = new CustomReportView($pdf);
$content = $page->generateView();
$pdf->setContent($content);
$pdf->generatePDF();
