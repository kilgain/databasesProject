<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "dbpassword1";
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
  <td>Park Name</td>
  <td>Unique Species Count</td>
</tr>

<?php



$query = mysqli_query($conn, "SELECT parkName, COUNT(DISTINCT scientificName) FROM species GROUP BY parkName ORDER BY COUNT(DISTINCT scientificName) ASC LIMIT 1")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> The national park with the lowest number of unique species is: </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['parkName']}</td>
    <td>{$row['COUNT(DISTINCT scientificName)']}</td>
   </tr>";
}

?>


<table border="1" align="center">
<tr>
  <td>Park Name</td>
  <td>Unique Species Count</td>
</tr>



<?php



$query = mysqli_query($conn, "SELECT parkName, SUM(CASE WHEN nativeness = \"Not Native\" then 1 else 0 end) as numInvasive FROM species GROUP BY parkName ORDER BY numInvasive DESC LIMIT 10")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> The national parks with the highest number of invasive species are: </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['parkName']}</td>
    <td>{$row['numInvasive']}</td>
   </tr>";
}

?>



<table border="1" align="center">
<tr>
  <td>Scientific Name</td>
  <td>Common Name</td>
  <td>Number of Parks Present (46 total)</td>
</tr>



<?php



$query = mysqli_query($conn, "SELECT scientificName, commonName, count(parkName) from species WHERE category = \"mammal\" group by scientificName order by count(parkName) DESC limit 10")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> The mammals that are found across the most number of parks are: </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['scientificName']}</td>
    <td>{$row['commonName']}</td>
    <td>{$row['count(parkName)']}</td>
   </tr>";
}

?>


<table border="1" align="center">
<tr>
  <td>Park Name</td>
  <td>Number of Approved Records</td>
</tr>



<?php



$query = mysqli_query($conn, "SELECT parkName, sum(case when record = \"Approved\" then 1 else 0 end) as numApproved from species group by parkName order by numApproved DESC limit 10")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> The parks with the highest numbers of approved species records are: </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['parkName']}</td>
    <td>{$row['numApproved']}</td>
   </tr>";
}

?>



</table>
</body>
</html>
