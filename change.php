<?php
	
	$count = $_POST["count"];
	settype($count, "int");
//El loop és una mica extrany. En comptes d'accedir a les cançons amb el $_POST[][], faig servir l'array files directament. Per algun motiu funcion millor. 
	for($i = 0; $i <= $count; $i++){
		//Part de pujada de l'arxiu
		$directori = "pujades/";
		$arxiu = $directori . basename($_FILES["song"]["name"][$i]);
		$pujadaOK = 1;
		$extensio = strtolower(pathinfo($arxiu,PATHINFO_EXTENSION));

		// Comprovar que sigui un arxiu d'àudio, mp3 o flac

		if(isset($_POST["submit"])) {
		    if($extensio == "mp3" or $extensio == "flac") {
		        echo "L'arxiu és d'audio - " . $extensio . ". <br />";
		        $pujadaOK = 1;
		    } 
		    else {
		        echo "Extensió incorrecta - feu servir mp3 o FLAC.<br />";
		        $pujadaOK = 0;
		    }
		}

		// Comprovar errors i pujar
		if ($pujadaOK == 0) {
		    echo "Hi hagut algun error en la pujada. <br />";
		} 
		else {
		    if (move_uploaded_file($_FILES["song"]["tmp_name"][$i], $arxiu)) {
		        echo "L'arxiu ". basename( $_FILES["song"]["name"][$i]). " s'ha pujat amb èxit. <br />";
		    } 
		    else {
		        echo "L'arxiu" . basename( $_FILES["song"]["name"][$i]) . "no s'ha pogut pujar. <br />";
		    }
		}

		//Canviar el nom a l'arxiu

		$autor = $_POST["author" . $i];
		$trackname = strtoupper($_POST["track" . $i]);
		$trackno = $_POST["trackno" . $i];
		$nomNou = $trackno . "-" . $autor . " -- " . $trackname . "." . $extensio;
		$arxiuFinal = $directori . $nomNou;
		$nomOk = 1;

		if(rename($arxiu, $arxiuFinal)){
			echo "El nom del vostre arxiu s'ha canviat amb èxit. Ara és: " . $nomNou . "<br />";
			$nomOk = 1;
		}
		else{
			$nomOk = 0;
		}
	}

echo "Feu clic <a href='descarrega.php'>ací</a> per a descarregar els arxius.";




?>