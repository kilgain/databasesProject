html>
<head>
        <title> Dynamic Query </title>
</head>

<body>
<h1>National Parks, Trails, Species</h1>


<?php
$servername = "localhost";
$username = "root";
$password = "password";
$db = "parks";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
}
echo "Select common name to see species present"
;
$species_names = mysqli_query($conn, "SELECT commonName FROM species") or die(mysqli_error($conn));

?>

<?php
$servername = "localhost";
$username = "root";
$password = "password";
$db = "parks";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
}
echo "Select scientific name to see species percent present in each park" 
;
$species_percent = mysqli_query($conn, "SELECT scientificName, count(*) * 100.0 / (SELECT count(*) from species) from species group by parkName") or die(mysqli_error($conn));

?>

<?php
$servername = "localhost";
$username = "root";
$password = "password";
$db = "parks";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
}
echo "Select common name to see species percent present in each category" 
//What are the common names of all organisms of category X 
;
$species_cat = mysqli_query($conn, "SELECT commonName from species AND GROUP BY category") or die(mysqli_error($conn));

?>




<fieldset>
        <form id = "dynamicQuery" method="post" action="chinyeDynamicResponse1.php">
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
                while($rows = $species_names->fetch_assoc())
                {
                        $name = $rows['commonName'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit" name="submit" />
</fieldset>


<br>
echo "Select species to see population percent in each park:"
//What % of species in park X are native

<fieldset>
        <form id = "dynamicQuery2" method="post" action="chinyeDynamicResponse2.php">
                <?php
                        if(isset($_POST['submit2']))
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
                while($rows = $species_percent->fetch_assoc())
                {
                        $name = $rows['scientificName'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit2" name="submit2" formaction = "/chinyeDynamicResponse2.php" />
</fieldset>

<br>
echo "Select common name to see organism present in different categories:"
//What are the common names of all organisms of category X

<fieldset>
        <form id = "dynamicQuery3" method="post" action="chinyeDynamicResponse3.php">
                <?php
                        if(isset($_POST['submit3']))
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
                while($rows = $species_cat->fetch_assoc())
                {
                        $name = $rows['commonName'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit3" name="submit3" formaction = "/chinyeDynamicResponse3.php" />
</fieldset>






</body>
</html>

