




<?php
if (isset($_POST['submit']))
{
        if (!isset($_POST['candy']))
        {
                $error = "*" . "Please fill in the required field.";

        }
        else
        {
                $candy = $_POST['candy'];
        }
}
?>


<?php
        if(isset($_POST['submit']))
        {
                if(!isset($error))
                {
                        echo "Your selected candy is: " . $candy;
			echo "<br>";
                }
        }
?>

<?php



$servername = "localhost";
$username = "root";
$password = "dbpassword1";
$db = "candy";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";



	echo "SELECT * FROM Candy WHERE name=\"{$candy}\" <br>";
        $candy_query = mysqli_query($conn, "SELECT * FROM Candy WHERE name=\"{$candy}\"");
	echo("error description: " . mysqli_error($conn) . "<br>");
        echo $candy_query ? 'true' : 'false';
	echo "<br>";
	echo "Query complete.";
        while ($row = mysqli_fetch_array($candy_query)) {
		echo
                "<tr>
                <td>{$row['candy_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['type']}</td>
                </tr>";
        }

        echo $candy_query
/*

        $candy_query2 = mysqli_query($conn, "SELECT * FROM Stores WHERE store_id in (SELECT store_id FROM Sells WHERE candy_id in (SELECT candy_id FRO>
        while ($row = mysqli_fetch_array($candy_query)) {
                echo
                "<tr>
                <td>{$row['store_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['address']}</td>
                </tr>";
        }
         */
?>

