<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Registration</title>
</head>
<body>

<h1>Registration Results</h1>

<?php // Script 6.7 - handle_reg7.php #7

/* This script receives seven values
from register.html:
email, password, confirm, year, terms,
color, submit */

// Address error management, if you want.

// Flag variable to track success:
$okay = true;

// Validate the email address:
if (empty($_POST['email']))
{
	print '<p class="error">Please enter your email address.</p>';
	$okay = false;
}

//Validate password:
if (empty($_POST['password'])) 
{
	print '<p class="error">Please enter your password.</p>';
	$okay = false;
}

//check the two passwords for equality:
if ($_POST['password'] != $_POST['confirm'])
{
	print '<p class="error">Your confirmed password does not match the
	the original password.</p>';
	$okay = false;
}

//Validate the birth year:
if (is_numeric($_POST['year']) && strlen($_POST['year']) == 4)
{
//check that they were born before this year:
if ($_POST['year'] < 2016)
{
	$age = 2016 - $_POST['year'];//calculate age this year.
}else{
	print '<p class="error">Either you entered you birth year wrong
	or you come from thr future!</p>';
	$okay = false;
	
} // end of 2nd conditional.

}else{ // else for 1st condition.

	print '<p class="error">Please enter the year
	you were born as four digits.</p>';
	$okay = false;
} // end of 1st conditional.

// validate the terms:
if ( !isset($_POST['terms'])) 
{
	print '<p class="error">You must accept the terms.</p>';
	$okay = false;
}
 
// validate the color:
// validate the color:
if (!empty($_POST['color'])) {

    if ($_POST['color'] == 'red') {
        $color_type = 'primary';
    } elseif ($_POST['color'] == 'yellow') {
        $color_type = 'primary';
    } elseif ($_POST['color'] == 'green') {
        $color_type = 'primary';
    } elseif ($_POST['color'] == 'blue') {
        $color_type = 'secondary';
	} elseif ($_POST['color'] == 'magenta') {
        $color_type = 'primary';
    } elseif ($_POST['color'] == 'burgundy') {
        $color_type = 'secondary';
    }

} else {
    print '<p class="error">Please select your favorite color.</p>';
    $okay = false;
}


// If there were no errors, print a
// success message:
if ($okay) {
    print '<p>You have been successfully registered (but not really).</p>';
	print "<p>You will turn $age this year.</p>";
	print "<p>Your favorite color is a $color_type color.</p>";
}

?>

</body>
</html>