<html>
<head>
	<link rel="stylesheet" href="style.css" />
</head>
<body>

<h1>Administering DB From a Form</h1>
	<h2>Add a student...</h2>
	<fieldset>
	<legend>Add a record</legend>
	<form method="post" action="add_query.php">
		<input type="hidden" name="add" value="add" />
		<input type="text" name="studentnumber" id="studentnumber" />
		<label for="studentnumber"> - Student #</label><br />
		<input type="text" name="firstname" id="firstname" />
		<label for="firstname"> - Firstname</label><br />
		<input type="text" name="lastname" id="lastname" />
		<label for="lastname"> - Lastname</label><br />
		<input type="submit" value="Submit" />
	</form>
	</fieldset>	

	
</body>
</html>