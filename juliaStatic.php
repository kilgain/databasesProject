<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "maple";
$db = "final";
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
}
echo "Connected Successfully."
?>

<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Scientific Name  </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Common Name  </td>
</tr>

<?php
$query = mysqli_query($conn, 'SELECT DISTINCT scientificName, commonName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "WA") AND category = "Mammal";') or die(mysqli_error($conn));
echo "<p style = \"text-align:center\"> What mammals are found in state parks in Washington? </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
    "<tr>
    <td>{$row['scientificName']}</td>
    <td>{$row['commonName']}</td>
    </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Scientific Name  </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Common Name  </td>
</tr>

<?php
$query = mysqli_query($conn, 'SELECT DISTINCT scientificName, commonName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "FL") AND category = "Mammal";') or die(mysqli_error($conn));
echo "<p style = \"text-align:center\"> What mammals are found in state parks in Florida? </p>";
while ($row = mysqli_fetch_array($query)) {
	  echo
        "<tr>
         <td>{$row['scientificName']}</td>
         <td>{$row['commonName']}</td>
         </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Scientific Name  </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Common Name  </td>
</tr>

<?php
$query = mysqli_query($conn, 'SELECT DISTINCT scientificName, commonName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "ME") AND category = "Mammal";') or die(mysqli_error($conn));
echo "<p style = \"text-align:center\"> What mammals are found in state parks in Maine? </p>";
while ($row = mysqli_fetch_array($query)) {
          echo
        "<tr>
         <td>{$row['scientificName']}</td>
         <td>{$row['commonName']}</td>
         </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Scientific Name  </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Common Name  </td>
</tr>

<?php
$query = mysqli_query($conn, 'SELECT DISTINCT scientificName, commonName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "WA") AND category = "Mammal" INTERSECT SELECT DISTINCT scientificName, commonName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "FL") AND category = "Mammal" INTERSECT SELECT DISTINCT scientificName, commonName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "ME") AND category = "Mammal";') or die(mysqli_error($conn));
echo "<p style = \"text-align:center\"> What mammals are shared between FL, ME, and WA? </p>";
while ($row = mysqli_fetch_array($query)) {
          echo
            "<tr>
             <td>{$row['scientificName']}</td>
             <td>{$row['commonName']}</td>
             </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Scientific Name  </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Common Name  </td>
</tr>

<?php
$query = mysqli_query($conn, 'SELECT DISTINCT scientificName, commonName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "WA") AND scientificName NOT IN (SELECT scientificName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "ME" OR state = "FL")) AND category = "Mammal";') or die(mysqli_error($conn));
echo "<p style = \"text-align:center\"> What mammals are unique to Washington? (Not in FL, ME) </p>";
while ($row = mysqli_fetch_array($query)) {
          echo
          "<tr>
           <td>{$row['scientificName']}</td>
           <td>{$row['commonName']}</td>
           </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Scientific Name  </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Common Name  </td>
</tr>

<?php
$query = mysqli_query($conn, 'SELECT DISTINCT scientificName, commonName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "FL") AND scientificName NOT IN (SELECT scientificName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "ME" OR state = "WA")) AND category = "Mammal";') or die(mysqli_error($conn));
echo "<p style = \"text-align:center\"> What mammals are unique to Florida? (Not in ME, WA) </p>";
while ($row = mysqli_fetch_array($query)) {
          echo
           "<tr>
            <td>{$row['scientificName']}</td>
            <td>{$row['commonName']}</td>
            </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Scientific Name  </td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Common Name  </td>
</tr>

<?php
$query = mysqli_query($conn, 'SELECT DISTINCT scientificName, commonName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "ME") AND scientificName NOT IN (SELECT scientificName FROM species WHERE parkName IN (SELECT parkName FROM park WHERE state = "WA" OR state = "FL")) AND category = "Mammal";') or die(mysqli_error($conn));
echo "<p style = \"text-align:center\"> What mammals are unique to Maine? (Not in FL, WA) </p>";
while ($row = mysqli_fetch_array($query)) {
          echo
            "<tr>
             <td>{$row['scientificName']}</td>
             <td>{$row['commonName']}</td>
             </tr>";
}
?>
</table>



</body>
</html>
