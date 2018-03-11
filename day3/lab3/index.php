<!DOCTYPE html>
<html>
	<head>
		<title>PHP Lab 03</title>
		 <link rel="stylesheet" href="http://bcitcomp.ca/ssd/css/style.css" />
	</head>
	<body>
		<h1>PHP Lab 03</h1>
		<?php

		if( isset($_GET['username']) == false || isset($_GET['password']) == false || isset($_GET['studentNumber']) == false){
			$displayForm    = true;
		}
		else {
			$displayForm    = true;
			$displayError	= false;
			
			$errors = "";
			if (strlen(trim($_GET['username']))<2){
				$displayError = true;
				$errors = $errors . "<p>Not a valid username.<p>";
			}
			if ($_GET['password'] != "bcit"){
				$displayError = true;
				$errors = $errors . "<p>Incorrect password.</p>";
			}
	
			if (preg_match("/^A0[0-9]{7}|a0[0-9]{7}$/",trim($_GET['studentNumber'])) == 0){
				$displayError = true;
				$errors = $errors . "<p>Invalid Student Number.</p>";
			}
	
		
	
			if ($displayError == true){
				?>
				<fieldset style='background-color:pink;'><legend>Form Validation errors:</legend>
				<?php 
				//echo "<p>".$errors."</p>"
				echo "$errors";
				?>
				
				<small>Please try the form again.</small>
			</fieldset>		
			<?php
			}else {
				$displayForm = false;
				if ($_GET['gender'] == "male"){
					$pre = "Mr. ";
				}
				else {
					$pre = "Ms. ";
				}
				echo "<p>Hello ".$pre.$_GET['username'].".</p>";
				if( !isset($_GET['languages'])){
					echo "<p>You are not studying any computer language(s)</p>";
				}
				else {
					$number = sizeof($_GET['languages']);
					//echo $number;
					echo "<p>You study ".$number." computer language(s):</p>";
					
						echo "<ul>";
						foreach($_GET['languages'] as $onelanguage){
							echo "<li>" . $onelanguage . "</li>";
						}
						echo"</ul>";
						if ($number >2 && $number <=5){
							echo "<p>You are multilingual!</p>";
						 }
						 if ($number >5){
							echo "<p>Impressive. You have been studying quite a few computing languages</p>";
						 }
						// echo "hi";
						
				}
						echo " <p><a href='index.php'>Try the form again</a></p>";

			}
			
		}

		



		if($displayForm == true){
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">		
		<fieldset>	
		<legend>Please complete and submit the form.</legend>
		<input	type="text" 
				id="username" 
				name="username"
				placeholder="Username"	/><br />
		<input	type="password" 
				id="password" 
				name="password"
				placeholder="Password"	/><br />
		<input	type="text" 
				id="studentNumber" 
				name="studentNumber"
				placeholder="Student Number" />	<br />
		<fieldset>		
			<legend>Gender</legend>
			<input type="radio" name="gender" value="male" id="male" checked="checked" />
			<label for="male">Male</label>
			<br />
			<input type="radio" name="gender" value="female" id="female" />
			<label for="female">Female</label>
			<br />
		</fieldset>
		<fieldset>		
			<legend>Which Languages Do You Study?</legend>
			<input type="checkbox" name="languages[]" value="c++" id="c++" />
			<label for="c++">C++</label>
			<br />
			<input type="checkbox" name="languages[]" value="c#" id="c#" />
			<label for="c#">C#</label>
			<br />
			<input type="checkbox" name="languages[]" value="javascript" id="javascript" />
			<label for="javascript">Javascript</label>
			<br />
			<input type="checkbox" name="languages[]" value="java" id="java" />
			<label for="java">Java</label>
			<br />
			<input type="checkbox" name="languages[]" value="perl" id="perl" />
			<label for="perl">Perl</label>
			<br />
			<input type="checkbox" name="languages[]" value="php" id="php" />
			<label for="php">PHP</label>
			<br />
			<input type="checkbox" name="languages[]" value="python" id="python" />
			<label for="python">Python</label>
		
		</fieldset>
		<input type="submit" value="Submit" style="float:left;" />			
		</fieldset>	
		</form>
		<?php
}
	


	?>

	</body>
</html>