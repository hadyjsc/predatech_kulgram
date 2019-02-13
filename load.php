<?php
class Load
{
	function view ($url, $data = null)
	{
		$explode = explode('/',$url);

		$folder = $explode[0];
		$file = $explode[1];

		if (is_array($data)) {
			extract($data);		
		}
		
		$dir = 'views/'.$folder;
		if(is_dir($dir)){
			include_once $dir.'/'.$file.'.php';
		}else{
			include_once '404.php';
		}
	}
}
?>