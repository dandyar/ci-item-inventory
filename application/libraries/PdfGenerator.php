<?php
	
	class PdfGenerator
	{
		
		public function generate($html, $filename)
		{
			define('DOMPDF_ENABLE_AUTOLOAD', FALSE);
			define('DOMPDF_ENABLE_REMOTE', TRUE);
			require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");
			$dompdf = new DOMPDF(array('enable_remote' => true));
			$dompdf->load_html($html);
			$dompdf->render();
			$dompdf->stream($filename.'.pdf', array('Attachment'=>0));
		}
	}