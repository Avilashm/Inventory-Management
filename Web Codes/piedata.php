<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brd13_db";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
					//select from database
					$sql = "SELECT COUNT(Serviceability) FROM rfid_db GROUP BY Serviceability ORDER BY Serviceability DESC";
					$result = $conn->query($sql);
					$jsonarray=array();
					if ($result->num_rows > 0) { $i = 1;
						// Output data of each row 
						// Create name:value pair for "past.php" page.
						while($row = $result->fetch_assoc())   //while ($array = mysql_fetch_row($result))
						{
						$jsonitem=array();
						 //
						   $jsonitem['cat'.$i] = $row["COUNT(Serviceability)"];  
						   //Creating name value pairs.
						   array_push($jsonarray,$jsonitem);
						   $i++;
						}
					}
					//$jsonarray created from the selected data.
					echo json_encode($jsonarray);
					//echo JSON.
					//echo json_encode($jsonarray);	
					
					$conn->close();
?>
						