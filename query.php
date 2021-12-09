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
$db = "candy";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";

$candy_names = mysqli_query($conn, "SELECT name FROM Candy") or die(mysqli_error($conn));

?>


<fieldset>
        <form id = "dynamicQuery" method="post" action="sample2.php">
                <?php
                        if(isset($_POST['submit']))
                        {
                                if (isset($error))
                                {
                                        echo $error;
                                }
                        }
                ?>

                <select name="candy">
                <option value = ""> Select... </option>
                <?php
                while($rows = $candy_names->fetch_assoc())
                {
                        $name = $rows['name'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit" name="submit" />
</fieldset>


</body>
</html>
