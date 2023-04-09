<?php 
function file_download($download)
{
	if(file_exists($download))
				{
					header("Content-Description: File Transfer"); 
					
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Accept-Ranges: bytes');
					header('Content-Disposition: attachment; filename="'.basename($download).'"'); 
					header('Content-Type: application/octet-stream'); 
					ob_clean();
					flush();
					readfile ($download);
				}
				else
				{
				echo "<script>alert('file not found');</script>";	
				}
	
}
if(isset($_POST['download']))
{

$file=trim($_POST['file']);

file_download($file);

}
?>