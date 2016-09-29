<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebApp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, no,price  FROM Purachase_Order";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
        echo "Order Id: " . $row["id"]. "  Order NO: " . $row["no"]. "  Order Price: " .
         $row["price"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

