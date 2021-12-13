<?php
if (isset($_POST['submit']))
{
  // Make sure user defined query
  if (!$_POST['park'])
  {
     $error = "Unable to complete request. Please fill in the required field.";
     echo $error;
     exit();
  }
  else
  {
     $park_name = $_POST['park'];
  }
}
?>

<html>
<body>
<table border="1" align="center">
  <tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Trail Name </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Popularity </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Length </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Elevation </td>
  </tr>

<?php
$servername = "localhost";
$username = "root";
$password = "maple";
$db = "dbfinal";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
}

echo " <p style=\"text-align:center\"> Most popular trails in " . $park_name . " are: </p>";

// Form query
$query_contents = "SELECT * FROM trails WHERE parkName=\"{$park_name}\" ORDER BY popularity DESC LIMIT 3";
$query = mysqli_query($conn, $query_contents);

// Check if query is viable. Run query if viable.
if (!$query) {
	die(mysqli_error($conn));}
else {
	while ($row = mysqli_fetch_array($query)) 
	{
	echo
  	"<tr>
   	<td>{$row['trailName']}</td>
  	<td>{$row['popularity']}</td>
   	<td>{$row['length']}</td>
   	<td>{$row['elevationGain']}</td>
   	</tr>";
	}
}
?>

<br><br>
<a href='/index.html'>Go to Home Page</a><br/>
<a href='/dynamicQueries.php'>Go Back to Dynamic Query Page</a><br/>
<br><br>

</table>
</body>
</html>
