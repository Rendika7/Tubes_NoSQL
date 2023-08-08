<?php

include 'connection.php';

if(isset($_POST['signup'])){

	$username = $_POST['username'];
	$email = $_POST['email'];
    $password = sha1($_POST['password']);
}

$data = array(
	"username" => $username,
	"email" => $email,
	"password" => $password
);

//insert into MongoDB Users Collection
$insert = $userCollection->insertOne($data);

if($insert){
	?>
		<center><h4 style="color: green;">Successfully Registered</h4></center>
		<center><a href="index.php">Login</a></center>
	<?php
}
else{
	?>
		<center><h4 style="color: red;">Registration Failed</h4></center>
		<center><a href="index.php">Try Again</a></center>
	<?php
}

?>
