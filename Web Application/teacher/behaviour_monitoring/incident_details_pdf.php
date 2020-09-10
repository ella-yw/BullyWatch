<?php
require_once("../../DOMPDF/dompdf_config.inc.php");
spl_autoload_register('DOMPDF_autoload');
$report_id = $_GET['report_id'];
session_start();
$_SESSION['incident_id_for_pdf'] = $report_id;
$html = file_get_contents("incident_details_html_for_pdf.php");

	$dompdf = new DOMPDF();
	$dompdf->set_paper('a4','landscape');
	$dompdf->load_html($html);
	$dompdf->render();	
	$dompdf->stream("Incident Details (Parameter) Report.pdf");
			


$dompdf = new DOMPDF();
?>