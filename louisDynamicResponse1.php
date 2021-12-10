




<?php
if (isset($_POST['submit']))
{
        if (!isset($_POST['species']))
        {
                $error = "*" . "Please fill in the required field.";
		echo $error;
        }
        else
        {
                $scientificName = $_POST['species'];
        }
}
?>


<?php
        if(isset($_POST['submit']))
        {
                if(!isset($error))
                {
                  //      echo "Your selected species is: " . $scientificName;
		  //	echo "<br>";
                }
        }
?>


<table border="1" align="center">
<tr>
  <td>Park Name</td>
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
echo " <p style=\"text-align:center\"> Scientific Name " . $scientificName . " is present in: </p>";



        $candy_query = mysqli_query($conn, "SELECT parkName FROM species WHERE scientificName=\"{$scientificName}\"");
        while ($row = mysqli_fetch_array($candy_query)) {
		echo
                "<tr>
                <td>{$row['parkName']}</td>
                </tr>";
        }

?>

