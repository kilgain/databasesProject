<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "password";
$db = "parks";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<table border="1" align="center">
<tr>
  <td>Park Names</td>
</tr>

<?php
$query = mysqli_query($conn, "SELECT parkName FROM park")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> All the parks present: </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['parkName']}</td>
   </tr>";
}

?>

<table border="1" align="center">
<tr>
  <td>Category</td>
  <td>Species Common Names</td>
</tr>


<?php
$query = mysqli_query($conn, "SELECT category, commonName FROM species GROUP BY category")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> All the categories of species present: </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['category']}</td>
    <td>{$row['commonName']}</td>
   </tr>";
}

?>

<table border="1" align="center">
<tr>
  <td>Category</td>
  <td>Species Scientific Names</td>
</tr>


<?php
$query = mysqli_query($conn, "SELECT category, scientificName FROM species GROUP BY category")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> All the categories of species present: </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['category']}</td>
    <td>{$row['scientificName']}</td>
   </tr>";
}

?>

<table border="1" align="center">
<tr>
  <td>Unique Species Scientific Names</td>
</tr>


<?php
$query = mysqli_query($conn, "SELECT DISTINCT scientificName FROM species ORDER BY scientificName ASC LIMIT 15")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> List of 15 Unique Scientific Names in Ascending Order: </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['scientificName']}</td>
   </tr>";
}

?>

<table border="1" align="center">
<tr>
  <td>Species Scientific Names</td>
  <td>Possible Occurence Status</td>
</tr>


<?php
$query = mysqli_query($conn, "SELECT scientificName, Occurrence FROM species GROUP BY Occurrence")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> List of Unique Occurrence status present in species: </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['scientificName']}</td>
    <td>{$row['Occurrence']}</td>
   </tr>";
}
?>

</table>
</body>
</html>
