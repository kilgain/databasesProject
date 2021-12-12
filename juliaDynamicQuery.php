<html>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "maple";
$db = "final";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	        die("Connection failed: " . $conn->connect_error);
}

$park_names = mysqli_query($conn, "SELECT parkName FROM trails") or die(mysqli_error($conn));
$acres_sizes = mysqli_query($conn, "SELECT acres FROM park ORDER BY acres DESC") or die(mysqli_error($conn));
?>


<?php
echo "Select a park to see the top 3 most popular trails:";
?>
<fieldset>
        <form id = "dynamicQuery" method="post" action="juliaDynamicResponse1.php">
                <?php
                        if(isset($_POST['submit']))
                        {
                                if (isset($error))
                                {
                                        echo $error;
                                }
                        }
                ?>

                <select name="state">
                <option value = ""> Select... </option>
                <?php
                while($rows = $park_names->fetch_assoc())
                {
                        $name = $rows['parkName'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit" name="submit" />
</fieldset>

<?php
echo "Select an acre amount to see what parks are greater than of equal to that size:";
?>

<fieldset>
        <form id = "dynamicQuery2" method="post" action="juliaDynamicResponse2.php">
                <?php
                        if(isset($_POST['submit2']))
                        {
                                if (isset($error))
                                {
                                        echo $error;
                                }
                        }
                ?>

                <select name="acre">
                <option value = ""> Select... </option>
                <?php
                while($rows = $acres_sizes->fetch_assoc())
                {
                        $name = $rows['acres'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit" name="submit2" formaction = "/juliaDynamicResponse2.php" />
</fieldset>




</body>
</html>
