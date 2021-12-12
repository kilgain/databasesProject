<?php
if (isset($_POST['submit2']))
{
  if (!isset($_POST['acre']))
  {
     $error = "*" . "Please fill in the required field.";
     echo $error;
  }
  else
  {
     $acres_size = $_POST['acre'];
  }
}
?>

<html>
<table border="1" align="center">
  <tr>
  <td> Park Name </td>
  <td> State </td>
  <td> Acres </td>
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

echo " <p style=\"text-align:center\"> States greater than or equal to " . $acres_size . " acres are: </p>";

$query = mysqli_query($conn, "SELECT parkName, state, acres FROM park WHERE acres >= \"{$acres_size}\"");
while ($row = mysqli_fetch_array($query)) 
{
echo
  "<tr>
   <td>{$row['parkName']}</td>
   <td>{$row['state']}</td>
   <td>{$row['acres']}</td>
   </tr>";
}
?>
</table>
</html>
