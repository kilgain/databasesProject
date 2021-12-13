<?php
if (isset($_POST['submit3']))
{
        if (!$_POST['scientificName'])
        {
                $error = "Unable to complete request. Please fill in the required field.";
		echo $error;
		exit();
        }
        else
        {
                $scientificName = $_POST['scientificName'];
        }
}
?>

<html>
<body>
<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Park Name</td>
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
echo " <p style=\"text-align:center\"> " . $scientificName . " is present in: </p>";

// Form Query
$query_contents = "SELECT parkName FROM species WHERE scientificName=\"{$scientificName}\"";
$query = mysqli_query($conn, $query_contents);

// Check if query is viable. Run query if viable.
if (!$query) {
	die(mysqli_error($conn));}
else {
        while ($row = mysqli_fetch_array($query)) {
		echo
                "<tr>
                <td>{$row['parkName']}</td>
                </tr>";
        }
}
?>

<br><br>
<a href='/index.html'>Go to Home Page</a><br/>
<a href='/dynamicQueries.php'>Go Back to Dynamic Query Page</a><br/>
<br><br>

</body>
</html>

