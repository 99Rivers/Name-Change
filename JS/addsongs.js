//Set global variables for the counts

var count = 0;
function addSongs(){
	//Add 1 to the count of songs
	count++;
	document.getElementById("count").value = count;

	//Remove the submit button
	var submit = document.getElementById("go" + "0");
	document.songform.removeChild(submit);

	//Add a line break for a e s t h e t i c s
	var linebreak = document.createElement("BR");

	document.songform.appendChild(linebreak);
	//Add the input field for the track no and set its value
	var newTrackNo = document.createElement("input");
	newTrackNo.type= "text";
	newTrackNo.name = "trackno" + count;
	newTrackNo.value = count;
	newTrackNo.style.margin = "3px 3px 3px 3px"
	document.songform.appendChild(newTrackNo);

	//Add the input field for the author and set its placeholder
	var newAuthor =  document.createElement("input");;
	newAuthor.type = "text";
	newAuthor.name = "author" + count;
	newAuthor.placeholder = "Track Author";
	newAuthor.style.margin = "3px 3px 3px 3px"
	document.songform.appendChild(newAuthor);

	//Add the input field for the track name  and set its placeholder

	var newTrack =  document.createElement("input");;
	newTrack.type = "text";
	newTrack.name = "track" + count;
	newTrack.placeholder = "Track Name";
	newTrack.style.margin = "3px 3px 3px 3px"
	document.songform.appendChild(newTrack);

	//Add the input field for the file

	var newFile = document.createElement("input");
	newFile.type = "file";
	newFile.name = "song[]";
	document.songform.appendChild(newFile);

	//Add the submit button again

	var newSubmitButton = document.createElement("input");
	newSubmitButton.type= "submit";
	newSubmitButton.id = "go" + "0";
	newSubmitButton.value ="Change my track names dawg"
	document.songform.appendChild(newSubmitButton);

}