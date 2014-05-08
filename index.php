<?php
$host="localhost";
$user="root";
$pass="";

$connect=mysql_connect($host, $user, $pass) or die("Could not connect <br />".mysql_error());
$select_db=mysql_select_db("website", $connect) or die("Unable to Connect <br />".mysql_error());

if (isset($_POST['btn'])) {
	$username=$_POST['uname'];
	$password=$_POST['pass'];
	$ser="SELECT * FROM user WHERE username='$username' && password='$password'";
	$ser_query=mysql_query($ser) or die('Problem finding user <br />'.mysql_error());
	$res=mysql_fetch_array($ser_query);
	if ($res['username']===$username && $res['password']===$password) {
		echo "Login Successfull <br /> Welcome {$res['fname']} {$res['lname']}";
		// set your session to keep your user loged in
	}
	else{
		echo "Error with login, Please try again.";
	}

}

?>

<form method="post">
	<input type="text" name="uname" placeholder="User Name" />
	<input type="password" name="pass" placeholder="Password" />
	<input type="submit" name="btn" value="Login">
</form>
