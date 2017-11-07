<?php

ini_set('display_errors',1);
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
echo "Connected successfully";
 
$sql = "CREATE TABLE IF NOT EXISTS Stocktransaction (" .
 "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, " .
 "name VARCHAR(30) NOT NULL, " .
 "email VARCHAR(30) NOT NULL, " .
 "num VARCHAR(30) NOT NULL, ".
 "price VARCHAR(30) NOT NULL, ".
 "currency VARCHAR(30) NOT NULL,".
 "state VARCHAR(30) NOT NULL)";

echo "<br/>";
echo "sql for create table: " . $sql;

if ($conn->query($sql) === TRUE) {
    echo "<br/>";
    echo "Table created successfully";

} else {
    echo "<br/>";
    echo "Error creating table: " . $conn->error;

}
//insert data and get last id
$sql = "INSERT INTO Stocktransaction (name, email, num, price, currency, state) ".
"VALUES ('JessMariana', 'JessMariana@gmail.com', '3152176604', '3890', 'dollars', 'AL')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is:". $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
