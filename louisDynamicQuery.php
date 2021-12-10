<html>
<head>
        <title> Sample Dynamic Query </title>
</head>

<body>
<h1>Picker Processing</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "dbpassword1";
$db = "parks";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
}
echo "Select scientific name to see what parks it is present in:";

$candy_names = mysqli_query($conn, "SELECT scientificName FROM species") or die(mysqli_error($conn));

?>


<?php
$servername = "localhost";
$username = "root";
$password = "dbpassword1";
$db = "parks";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
}

$stateNames = mysqli_query($conn, "SELECT state FROM park WHERE LENGTH(state) < 3") or die(mysqli_error($conn));

?>






<fieldset>
        <form id = "dynamicQuery" method="post" action="louisDynamicResponse1.php">
                <?php
                        if(isset($_POST['submit']))
                        {
                                if (isset($error))
                                {
                                        echo $error;
                                }
                        }
                ?>

                <select name="species">
                <option value = ""> Select... </option>
                <?php
                while($rows = $candy_names->fetch_assoc())
                {
                        $name = $rows['scientificName'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit" name="submit" />
</fieldset>


<br>
Select state to see biggest park present there:
<fieldset>
        <form id = "dynamicQuery2" method="post" action="louisDynamicResponse2.php">
                <?php
                        if(isset($_POST['submit2']))
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
                while($rows = $stateNames->fetch_assoc())
                {
                        $name = $rows['state'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit2" name="submit2" formaction = "/louisDynamicResponse2.php" />
</fieldset>






</body>
</html>
