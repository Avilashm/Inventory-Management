<?php
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brd13_db";
// Create connection

$x = (isset($_GET['x']) ? $_GET['x'] : null);

if(($x==0)||($x==2))    //checks if request was made to update parameters or not.
{	
$uid  = (isset($_GET['uid']) ? $_GET['uid'] : null); 
$name = (isset($_GET['name']) ? $_GET['name'] : null); 
$ser  = (isset($_GET['ser']) ? $_GET['ser'] : null);
$dep  = (isset($_GET['dep']) ? $_GET['dep'] : null);

$conn = new mysqli($servername, $username, $password,$dbname);

$sql =  "INSERT INTO rfid_db (UID,Name,Dept,Serviceability) VALUES (\"$uid\",\"$name\",\"$dep\",\"$ser\") ON DUPLICATE KEY UPDATE Name = \"$name\" , Dept = \"$dep\", Serviceability = \"$ser\" ";
if (mysqli_query($conn, $sql))
{
   //echo " New record1 created successfully       ";
}
 else 
 {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }
$conn->close();



$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
					//select from database
					$sql = "SELECT *
						   FROM rfid_db";
					$result = $conn->query($sql);
					$jsonarray=array();
					if ($result->num_rows > 0) {
						// Output data of each row 
						// Create name:value pair for "past.php" page.
						while($row = $result->fetch_assoc())   //while ($array = mysql_fetch_row($result))
						{
						$jsonItem=array();
						 //
						   $jsonitem['S_no.'] = $row["S_no."];  						//Creating name value pairs.
						   $jsonitem['UID'] = $row["UID"];  							//Creating name value pairs.
						   $jsonitem['Name'] = $row["Name"];  							//Creating name value pairs.
						   $jsonitem['Dept'] = $row["Dept"];  							//Creating name value pairs.
						   $jsonitem['Serviceability'] = $row["Serviceability"];  		//Creating name value pairs.
						   $jsonitem['Reg_time'] = $row["Reg_time"];  					//Creating name value pairs.
						   array_push($jsonarray,$jsonitem);
						   
						}
					}
					//$jsonarray created from the selected data.
					echo json_encode($jsonarray);
					//echo JSON.
					//echo json_encode($jsonarray);	
					
					$conn->close();

}
else 
{
$uid  = (isset($_GET['uid']) ? $_GET['uid'] : null); 

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
					//select from database
					$sql = "SELECT * FROM rfid_db WHERE UID = \"$uid\"";
					$result = $conn->query($sql);
					$jsonarray=array();
					if ($result->num_rows > 0) {
						// Output data of each row 
						// Create name:value pair for "past.php" page.
						while($row = $result->fetch_assoc())   //while ($array = mysql_fetch_row($result))
						{
						$jsonItem=array();
						 //
						   $jsonitem['S_no.'] = $row["S_no."];  						//Creating name value pairs.
						   $jsonitem['UID'] = $row["UID"];  							//Creating name value pairs.
						   $jsonitem['Name'] = $row["Name"];  							//Creating name value pairs.
						   $jsonitem['Dept'] = $row["Dept"];  							//Creating name value pairs.
						   $jsonitem['Serviceability'] = $row["Serviceability"];  		//Creating name value pairs.
						   $jsonitem['Reg_time'] = $row["Reg_time"];  					//Creating name value pairs.
						   array_push($jsonarray,$jsonitem);
						   
						}
					}
					//$jsonarray created from the selected data.
					echo json_encode($jsonarray);
					//echo JSON.
					//echo json_encode($jsonarray);	
					
					$conn->close();	

}
	if($x==2)
	{
		header("location:/afproject/device.html");
	}
exit();
?>
						