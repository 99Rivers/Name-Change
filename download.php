<?php

//Llista dels arxius a uploads
$dir = "uploads/";
$list = scandir($dir);

$zipname = $dir . "0file.zip";

$zip = new ZipArchive();

if($zip->open($zipname, ZIPARCHIVE::CREATE)){
	//Omplir el fitxer zip amb les cançons. Comença al 3 per no incloure el directori sencer.
	for($i = 3; $i < count($list); $i++){
		$filename = $dir . $list[$i];
		$zip->addFile($filename);
	}
	$zip->close();
}else{
	echo"No s'han pogut comprimir els arxius <br />";
}

if(file_exists($zipname)){
	//Headers de descàrrega. Per dubtes, consultar StackExchange.
	header("Cache-Control: private");
	header("Content-type: application/force-download");
	header("Content-Transfer-Encoding: binary");
	header("Content-Disposition: attachment; filename=" . $zipname);
	//Aixo és per a mostrar el nom correctament a la descàrrega.
	header("Content-Length: " . filesize($zipname));
	readfile($zipname);
	echo "L'arxiu s'ha descarregat amb èxit <br />";
}else{
	echo "Error al descarregar";
}