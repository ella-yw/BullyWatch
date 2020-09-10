<?php
 error_reporting(0);
require_once("../../DOMPDF/dompdf_config.inc.php");
spl_autoload_register('DOMPDF_autoload');
$html = file_get_contents('incident_teacher_html_for_pdf.php');

	$dompdf = new DOMPDF();
	$dompdf->set_paper('a4','landscape');
	$dompdf->load_html($html);
	$dompdf->render();	
	$dompdf->stream("Incidents Handled By Teacher Report.pdf");
			


$dompdf = new DOMPDF();
?>