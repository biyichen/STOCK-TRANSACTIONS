<?php
error_reporting(E_ALL);

ini_set('display_errors', 1);
$id = $_GET["id"];

//----------------------------------------RETRIEVE RECORDS - DATABASE--------------------------------------------------
//Obtain login credentials
//$Id = $_GET['id'];
$servername = "localhost";
$username = "root";
$password = "3wmV4iVKvdF9";
$Databasename = "myDBbiyi";


// Create connection
$conn = new mysqli($servername, $username, $password, $Databasename);

// Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}



//Retrieve records
$sql  = "DELETE  FROM stocktransaction where id = ?" ;



        if( $stmt = $conn->prepare($sql)){
             $stmt->bind_param("i", $id);
             $stmt->execute(); 
             $conn->close();
             header('Location: http://ec2-54-69-58-81.us-west-2.compute.amazonaws.com/project2/displaydata.php',TRUE, 302);
            //rest of code here
        }else{
           //error !! don't go further
           var_dump($conn->error);
        }

//Close connection
$conn->close();

?>

