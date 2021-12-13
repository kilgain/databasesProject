<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "maple";
$db = "dbfinal";
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
}
?>

<br><br><a href='/index.html'>Go to Home Page</a><br>

<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Park Names</td>
</tr>
<?php
	$query = mysqli_query($conn, "SELECT parkName FROM park")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> What parks are present in the database? </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['parkName']}</td>
   </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Category</td>
</tr>
<?php
$query = mysqli_query($conn, "SELECT category, commonName FROM species GROUP BY category")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> What are all the categories of organisms present? </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['category']}</td>
   </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Occurence Status</td>
</tr>


<?php
$query = mysqli_query($conn, "SELECT scientificName, Occurrence FROM species GROUP BY Occurrence")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> What are possible 'occurence' statuses? </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['Occurrence']}</td>
   </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Unique Species Scientific Names</td>
</tr>
<?php
$query = mysqli_query($conn, "SELECT DISTINCT scientificName FROM species ORDER BY scientificName ASC LIMIT 15")
   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> What are the first 15 Unique Scientific Names in Ascending Order? </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['scientificName']}</td>
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



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Park Name</td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Unique Species Count</td>
</tr>
<?php
$query = mysqli_query($conn, "SELECT parkName, COUNT(DISTINCT scientificName) FROM species GROUP BY parkName ORDER BY COUNT(DISTINCT scientificName) ASC LIMIT 1")
	   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> What is the national park with the lowest number of unique species? </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['parkName']}</td>
    <td>{$row['COUNT(DISTINCT scientificName)']}</td>
   </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Park Name</td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Total Species Count</td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Invasive Species Count</td>
</tr>
<?php
$query = mysqli_query($conn, "SELECT parkName, COUNT(DISTINCT scientificName), SUM(CASE WHEN nativeness = \"Not Native\" then 1 else 0 end) as numInvasive FROM species GROUP BY parkName ORDER BY numInvasive DESC LIMIT 10")
	   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> What national parks have the highest number of invasive species? </p>";
while ($row = mysqli_fetch_array($query)) {
    echo
     "<tr>
      <td>{$row['parkName']}</td>
      <td>{$row['COUNT(DISTINCT scientificName)']}</td>
      <td>{$row['numInvasive']}</td>
      </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Scientific Name</td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Common Name</td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Number of Parks Present (46 total)</td>
</tr>
<?php
$query = mysqli_query($conn, "SELECT scientificName, commonName, count(parkName) from species WHERE category = \"mammal\" group by scientificName order by count(parkName) DESC limit 10")
	   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> What mammals are found across the most number of parks? </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
     "<tr>
      <td>{$row['scientificName']}</td>
      <td>{$row['commonName']}</td>
      <td>{$row['count(parkName)']}</td>
      </tr>";
}
?>
</table>



<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Park Name</td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Number of Approved Records</td>
</tr>
<?php
$query = mysqli_query($conn, "SELECT parkName, sum(case when record = \"Approved\" then 1 else 0 end) as numApproved from species group by parkName order by numApproved DESC limit 10")
	   or die (mysqli_error($conn));
echo "<p style = \"text-align:center\"> What are the parks with the highest numbers of approved species records? </p>";
while ($row = mysqli_fetch_array($query)) {
  echo
    "<tr>
     <td>{$row['parkName']}</td>
     <td>{$row['numApproved']}</td>
     </tr>";
}
?>
</table>

<br><br><a href='/index.html'>Go to Home Page</a><br>

</body>
</html>
