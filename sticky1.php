<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sticky Text Inputs</title>
</head>
<body>
<?php // Script 10.2 - sticky1.php 
/* This script defines and calls a function that creates a sticky text input. */

//This function makes a sticky text input.
//This function requires two arguments be passed to it.
function make_text_input($name, $label) {
	
	//Begin a paragraph and a label:
	print '<p><label>' . $label . ': ';
	
	//begin the input
	print '<input type="text" name="' . $name . '" size="20" ';
	
	//Add the value
	if (isset($_POST[$name])) {
		print ' value="' . htmlspecialchars($_POST[$name]) . '"';
	}
	
	//Completes the input
	print '></label></p>';
	
} //End of make_text_input() function.

//Makes form:
print '<form action="" method="post">';

//Create text inputs:
make_text_input('first_name', 'First Name');
make_text_input('last_name', 'Last Name');
make_text_input('email', 'Email Address');

print '<input type="submit" name="submit" value="Register!"></form>';

?>
</body>
</html>