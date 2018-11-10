<?php
	
	$count = $_POST["count"];
	settype($count, "int");

//Instead of using the $_POST array, I use the $_FILES one to access the data. It just seems to work better. 

	for($i = 0; $i <= $count; $i++){
		//Chosing the destination of the file
		$directory = "uploads/";
		$file = $directory . basename($_FILES["song"]["name"][$i]);
		$uploadOK = 1;
		$extension = strtolower(pathinfo($file,PATHINFO_EXTENSION));

		// Checking if it is an audio file (mp3 o flac).

		if(isset($_POST["submit"])) {
		    if($extension == "mp3" or $extension == "flac") {
		        echo "File has extension - " . $extension . ". <br />";
		        $uploadOK = 1;
		    } 
		    else {
		        echo "Your file is not supported. Please upload mp3 or FLAC files.<br />";
		        $uploadOK = 0;
		    }
		}

		// Uploading the file
		if ($uploadOK == 0) {
		    echo "Something went wrong uploading your files. <br />";
		} 
		else {
		    if (move_uploaded_file($_FILES["song"]["tmp_name"][$i], $file)) {
		        echo "The file ". basename( $_FILES["song"]["name"][$i]). " has been uploaded successfully. <br />";
		    } 
		    else {
		        echo "The file " . basename( $_FILES["song"]["name"][$i]) . " has been uploaded successfully. <br />";
		    }
		}

		//Changing the file's name

		$author = $_POST["author" . $i];
		$trackname = strtoupper($_POST["track" . $i]);
		$trackno = $_POST["trackno" . $i];
		$newName = $trackno . "-" . $author . " -- " . $trackname . "." . $extension;
		$finalFile = $directory . $newName;
		$nameOK = 1;

		if(rename($file, $finalFile)){
			echo "Your file's name was changed successfully. It is now called: " . $newName . "<br />";
			$nameOK = 1;
		}
		else{
			$nameOK = 0;
		}
	}

echo "Click <a href='download.php'>here</a> to download your newly named files.";




?>