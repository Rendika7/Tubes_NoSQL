<?php
//this pulls the MongoDB driver from vendor folder
require_once  'vendor/autoload.php';

//connect to MongoDB Database
$databaseConnection = new MongoDB\Client;

//connecting to specific database in mongoDB
$myDatabase = $databaseConnection->rendika;

//connecting to our mongoDB Collections
$userCollection = $myDatabase->users;

if($userCollection){
	echo "Collection ".$userCollection." Connected";
}
else{
	echo "Failed to connect to Database/Collection";
}

?>