




<?php
if (isset($_POST['submit2']))
{
        if (!isset($_POST['state']))
        {
                $error = "*" . "Please fill in the required field.";
		echo $error;
        }
        else
        {
                $state = $_POST['state'];
        }
}
?>


<?php
        if(isset($_POST['submit2']))
        {
                if(!isset($error))
                {
                        //echo "Your selected state is: " . $state;
		  	//echo "<br>";
                }
        }
?>


<table border="1" align="center">
<tr>
  <td>Park Name</td>
  <td>Acres</td>
</tr>



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
echo " <p style=\"text-align:center\"> The largest park in state " . $state . " is: </p>";

        $candy_query = mysqli_query($conn, "SELECT parkName, acres FROM park WHERE state= \"{$state}\" order by acres DESC limit 1");
        while ($row = mysqli_fetch_array($candy_query)) {
		echo
                "<tr>
                <td>{$row['parkName']}</td>
		<td>{$row['acres']}</td>
                </tr>";
        }

?>

