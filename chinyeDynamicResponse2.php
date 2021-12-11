<?php
if (isset($_POST['submit']))
{
        if (!isset($_POST['species']))
        {
                $error = "*" . "Please fill in the required field.";

        }
        else
        {
                $speciesName = $_POST['species'];
        }
}
?>


<?php
        if(isset($_POST['submit']))
        {
                if(!isset($error))
                {
           //             echo "Your selected species common name  is: " . $speciesName;
           //             echo "<br>";
                }
        }
?>

<table border="1" align="center">
<tr>
  <td>Scientific Name</td>
</tr>


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
echo " <p style=\"text-align:center\"> Scientific Names " . $speciesName . " present and percentages: </p>";


         $candy_query = mysqli_query($conn,  "SELECT scientificName, count(*) * 100.0 / (SELECT count(*) from species) from species group by parkName");
        while ($row = mysqli_fetch_array($candy_query)) {
                echo
                "<tr>
                <td>{$row['scientificName']}</td>
                </tr>";
        }

?>




