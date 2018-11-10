<!DOCTYPE html>
<html>
<head>
	<title>its-a me \\ NAME CHANGE</title>
	<script type="text/javascript" src="JS/addsongs.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
</head>
<body>
	<form action="change.php" method="post" enctype="multipart/form-data" name="songform">
		<input type="text" name="trackno0" value="1">
		<input type="text" name="author0" placeholder="Track Author">
		<input type="text" name="track0" placeholder="Track Name">
		<input type="file" name="song[]">
		<input type="button" value="Add Songerino" onclick="addSongs();">
		<input type="hidden" id="count" name="count" value="0">
		<input type="submit" id="go0" value="Change my track names dawg">
	</form>
</body>
</html>