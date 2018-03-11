
<!DOCTYPE html>
<html>
	<head>
		<title>SSD PHP Lab 8</title>
		<link rel="stylesheet" href="http://bcitcomp.ca/ssd/css/style.css" />

	</head>
	<body>
		<h1>SSD PHP Lab 8</h1>
<?php

require_once("wideimage/lib/WideImage.php");
const INIT_ZIP = "init_zip/";
const EXTRACTED_IMG = "extracted_img/";
const NEW_IMG = "new_img/";
const FINAL_ZIP = "final_zip/";

if (!isset($_FILES['filename'])){
    echo "<p>No file was uploaded. This application will watermark all images in a .zip file.</p><p><a href='index.php'>Upload a .zip file of images.</a></p>";
    die();
}
else {
    if ($_FILES['filename']['type'] != "application/zip"){
       echo "<p>Sorry, '".$_FILES['filename']['name']."' does not appear to be a .zip file</p><p><a href='index.php'>Upload a .zip file</a></p>";
       die(); 
    }
}

//determine where the temp file is
$temp_file_recently_uploaded = $_FILES['filename']['tmp_name'];

//determine where you want to save the uploaded file
$new_location_for_file = INIT_ZIP . $_FILES['filename']['name'];

//move the uploaded file
$success = move_uploaded_file($temp_file_recently_uploaded, $new_location_for_file);

//move_uploaded_file() returns true if successful
if($success == true){

    //unzip the zip file
    $zip = new ZipArchive();
    if( $zip->open( INIT_ZIP . $_FILES['filename']['name'] )) {
        echo "<p>Received file: '".$_FILES['filename']['name']."'</p>";	
        echo "<p>Zip file info:</p>";
        echo "<ul>";
        echo "<li>Number of files in archive: " . $zip->numFiles . "</li>";
        echo "<li>Filename: " . $zip->filename .  "</li>";
        echo "</ul>";
        $zip->extractTo( EXTRACTED_IMG );
        $zip->close();
        echo "<p>Unzip of ".$_FILES['filename']['name']." was successful</p>";
        unlink(INIT_ZIP . $_FILES['filename']['name']);

        //make the watermarks operataion
        $zip = new ZipArchive();
        
        echo "<p>Applying watermarks...</p>";
        $watermark = WideImage::load("watermark.gif");
        $images = scandir(EXTRACTED_IMG);
        foreach($images as $image){
            if (is_file(EXTRACTED_IMG.$image)){
                if (preg_match("/(\.jpg$)|(\.png$)|(\.jpeg$)/i",$image) != 0){
                    $new_img = WideImage::load(EXTRACTED_IMG.$image);
                    $watermarkedImage = $new_img->merge($watermark, "center", "center", 30);
                    $watermarkedImage->saveToFile( NEW_IMG. $image);
                    unlink(EXTRACTED_IMG.$image);
                }
                else {
                    echo "<p style='color:red;'>ERROR:".$image." is not an image!</p>";
                }
            }
        }

       


        $filename = $_FILES['filename']['name'];
        $zip = new ZipArchive();
        if ($zip->open(FINAL_ZIP.$filename,  ZipArchive::CREATE)){
            $files = scandir(NEW_IMG);
            foreach ($files as $file){
                if(is_file(NEW_IMG.$file)){
                    $zip->addFile(NEW_IMG.$file, $file);
                    
                }
            }
            
        }

        $zip->close();

        $images = scandir(NEW_IMG);
        foreach($images as $image){
            if (is_file(NEW_IMG.$image)){

                    unlink(NEW_IMG.$image);
            }
               

        }




        
        echo "<fieldset><legend>Your new images:</legend>";
        echo "<fieldset><legend>Download</legend>";
        echo "<p>Download your newly watermarked images as a .zip file: <a href='".FINAL_ZIP.$filename."'>'".FINAL_ZIP.$filename."'</a></p></fieldset></fieldset>";
        echo "<p><a href='index.php'>Back to the form</a></p>";
    }
    else{
        echo("<p class='error'>Uh oh! Could not unzip" .$_FILES['filename']['name']."</p><p><a href='index.php'>Upload a .zip file of images.</a></p>");	
        die();
    }

}else{
	echo "<p>File uploaded was NOT successful</p>";	
}

?>
