<?php
if (isset($_POST['submit2']))
{
  if (!isset($_POST['acre']))
  {
     $error = "*" . "Please fill in the required field.";
     echo $error;
     exit();
  }
  else
  {
     $acres_size = $_POST['acre'];
  }
}
?>

<html>
<body>
<table border="1" align="center">
  <tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Park Name </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> State </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Acres </td>
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

echo " <p style=\"text-align:center\"> States greater than or equal to " . $acres_size . " acres are: </p>";

// Form Query
$query_contents = "SELECT parkName, state, acres FROM park WHERE acres >= \"{$acres_size}\"";
$query = mysqli_query($conn, $query_contents);

// Check if query is viable. Run query if viable.
if (!query) {
	die(mysqli_error($conn));}
else {
	while ($row = mysqli_fetch_array($query)) 
	{
	echo
  	"<tr>
   	<td>{$row['parkName']}</td>
  	<td>{$row['state']}</td>
   	<td>{$row['acres']}</td>
   	</tr>";
	}
}
?>
<br><br>
<a href='/index.html'>Go to Home Page</a><br/>
<a href='/dynamicQueries.php'>Go Back to Dynamic Query Page</a><br/>
<br><br>

</body>
</table>
</html>
