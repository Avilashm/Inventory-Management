<?php
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id_db";
// Create connection

$w = (isset($_GET['w']) ? $_GET['w'] : null);


if(($w==1)||($w==2))  //Mobile is giving new data 
{
$id_new =  (isset($_GET['id']) ? $_GET['id'] :null);

//$lastdata = (new \DateTime())->format('Y-m-d H:i:s');

$id = $id_new;
//echo $id;

$conn = new mysqli($servername, $username, $password,$dbname);


			if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
									  } 
					//select from database
					$sql = "UPDATE current_id SET cuid = \"$id\"";
					$result2 = $conn->query($sql);
	$conn->close();					
}

$conn = new mysqli($servername, $username, $password,$dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
					//select from database
					$sql = "SELECT * FROM current_id ";
					$result = $conn->query($sql);
					$jsonarray=array();
					if ($result->num_rows > 0) {
						// Output data of each row 
						// Create name:value pair for "past.php" page.
						while($row = $result->fetch_assoc())   //while ($array = mysql_fetch_row($result))
						{
						$jsonItem=array();
						 //
						   $jsonitem['cuid'] = $row["cuid"];  						//Creating name value pairs.
						   $jsonitem['scantime'] = $row["scantime"];  				//Creating name value pairs.
																					//Creating name value pairs.
						   array_push($jsonarray,$jsonitem); 
						}
					}
					//$jsonarray created from the selected data.
					echo json_encode($jsonarray);
					//echo JSON.
					//echo json_encode($jsonarray);	
					
					$conn->close();	


	if($w==2)
	{
		header("location:/afproject/device.html");
		
	} 

exit();
?>
						