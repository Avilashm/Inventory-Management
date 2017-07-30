<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brd13_db";
// Create connection

$z = (isset($_GET['z']) ? $_GET['z'] : null);

if($z==0)    //checks if request was made to update parameters or not.
{	
$devid 	 = (isset($_GET['devid']) ? $_GET['devid'] : null); 
$desgntn = (isset($_GET['desgntn']) ? $_GET['desgntn'] : null); 
$serno   = (isset($_GET['serno']) ? $_GET['serno'] : null);
$usrnam  = (isset($_GET['usrnam']) ? $_GET['usrnam'] : null);

$conn = new mysqli($servername, $username, $password,$dbname);

$sql =  "INSERT INTO devices (Device_ID,Designation,`Service No.`,Username,`Current Status`) VALUES (\"$devid\",\"$desgntn\",\"$serno\",\"$usrnam\",0) ON DUPLICATE KEY UPDATE Designation = \"$desgntn\",`Service No.`=\"$serno\",Username=\"$usrnam\",`Current Status`=0";
if (mysqli_query($conn, $sql))
{
   //echo " New record1 created successfully       ";
}
 else 
 {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
$conn->close();
}
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
					//select from database
					$sql = "SELECT *
						   FROM devices";
					$result = $conn->query($sql);
					$jsonarray=array();
					if ($result->num_rows > 0) {
						// Output data of each row 
						// Create name:value pair for "past.php" page.
						while($row = $result->fetch_assoc())   //while ($array = mysql_fetch_row($result))
						{
						$jsonitem=array();
						 //
						   $jsonitem['S.no'] = $row["S.no"];  
						   $jsonitem['Device_ID'] = $row["Device_ID"];  						//Creating name value pairs.
						   $jsonitem['Designation'] = $row["Designation"];  							//Creating name value pairs.
						   $jsonitem['Service No.'] = $row["Service No."];  							//Creating name value pairs.//Creating name value pairs.
						   $jsonitem['CurrentStatus'] = $row["Current Status"]; 
						   $jsonitem['Access'] = $row["Access"];
						   $jsonitem['Last active'] = $row["Last Active"];  					//Creating name value pairs.
						   array_push($jsonarray,$jsonitem);
						   
						}
					}
					//$jsonarray created from the selected data.
					echo json_encode($jsonarray);
					//echo JSON.
					//echo json_encode($jsonarray);	
					
					$conn->close();
?>
						