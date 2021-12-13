<?php
if (isset($_POST['submit4']))
{
        if (!$_POST['state'])
        {
                $error = "Unable to complete request. Please fill in the required field.";
		echo $error;
		exit();
        }
        else
        {
                $state = $_POST['state'];
        }
}
?>

<html>
<body>
<table border="1" align="center">
<tr>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Park Name</td>
  <td style="font-weight: bold;background-color:#C8EAD9;height:45px;">Acres</td>
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

// Goal
echo " <p style=\"text-align:center\"> The largest park in state " . $state . " is: </p>";

// Check if query is viable. Make query if viable.
$query_contents = "SELECT parkName, acres FROM park WHERE state= \"{$state}\" order by acres DESC limit 1";

$query = mysqli_query($conn, $query_contents);
if (!$query) {
	die(mysqli_error($conn));}
else {
        while ($row = mysqli_fetch_array($query)) {
		echo
                "<tr>
                <td>{$row['parkName']}</td>
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
</html>
