<!DOCTYPE html>
<html>
	<head>
		<title>SSD PHP Lab 8</title>
		<link rel="stylesheet" href="http://bcitcomp.ca/ssd/css/style.css" />

	</head>
	<body>
		<h1>SSD PHP Lab 8</h1>
		<form	enctype="multipart/form-data"
				method="POST" 
				action="process_image_uploads.php">
		<p>This application will apply watermarking to a .zip file of images.</p>
		<fieldset>
			<legend>Upload a .zip file of images (Maximum size 2MB):</legend>
			<input	type="file" 
					name="filename" />
		</fieldset>
		
		<input type="submit" value="Submit" />
		</form>
	</body>
</html>
