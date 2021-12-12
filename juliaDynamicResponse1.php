<?php
if (isset($_POST['submit']))
{
  if (!isset($_POST['state']))
  {
     $error = "*" . "Please fill in the required field.";
     echo $error;
  }
  else
  {
     $stateName = $_POST['state'];
  }
}
?>

<html>
<table border="1" align="center">
  <tr>
  <td> Trail Name </td>
  <td> Popularity </td>
  <td> Length </td>
  <td> Elevation </td>
  </tr>

<?php
$servername = "localhost";
$username = "root";
$password = "maple";
$db = "final";
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
}
echo "Successful Connection!";

echo " <p style=\"text-align:center\"> Most popular trails in " . $stateName . " are: </p>";

$query = mysqli_query($conn, "SELECT * FROM trails WHERE parkName=\"{$stateName}\" ORDER BY popularity DESC LIMIT 3");
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
?>
</table>
</html>
