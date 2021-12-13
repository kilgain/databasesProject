<?php
if (isset($_POST['submit5']))
{
        if (!$_POST['park2'] or !$_POST['category2'])
        {
                $error = "*" . "Please fill in the required fields.";
		echo $error;
		exit();
        }
        else
        {
		$park = $_POST['park2'];
		$category = $_POST['category2'];
        }
}
?>

<html>
<body>
<table border="1" align="center">
<tr>
    <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Park Name  </td>
    <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Category  </td>
    <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Nativeness  </td>
    <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Number  </td>
</tr>

<?php
$servername = "localhost";
$username = "root";
$password = "maple";
$db = "dbfinal";

//Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
}
echo " <p style=\"text-align:center\"> Native vs NonNative Species ";
echo "<br> " . $park . " under category ". $category . " is: </p>";

// Form Query
$query_contents = "SELECT parkName, category, nativeness, COUNT(nativeness) as numNative FROM species WHERE category = \"{$category}\" AND parkName = \"{$park}\" AND nativeness = \"Native\"";
$query = mysqli_query($conn, $query_contents);

// Check if query is viable. Run query if viable.
if (!$query) {
        die(mysqli_error($conn));}
else {
        while ($row = mysqli_fetch_array($query)) {
                echo
               "<tr>
		<td>{$row['parkName']}</td>
		<td>{$row['category']}</td>
		<td>{$row['nativeness']}</td>
		<td>{$row['numNative']}</td>
                </tr>";
        }
}

$query_contents_2 = "SELECT parkName, category, nativeness, COUNT(nativeness) as numNative FROM species WHERE category = \"{$category}\" AND parkName = \"{$park}\" AND nativeness = \"Not Native\"";
$query_2 = mysqli_query($conn, $query_contents_2);
if (!$query_2) {
        die(mysqli_error($conn));}
else {
        while ($row = mysqli_fetch_array($query_2)) {
                echo
               "<tr>
                <td>{$row['parkName']}</td>
                <td>{$row['category']}</td>
                <td>{$row['nativeness']}</td>
                <td>{$row['numNative']}</td>
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
