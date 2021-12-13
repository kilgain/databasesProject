<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "maple";
$db = "dbfinal";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	        die("Connection failed: " . $conn->connect_error);
}

$park_names = mysqli_query($conn, "SELECT DISTINCT parkName FROM trails") or die(mysqli_error($conn));
$acres_sizes = mysqli_query($conn, "SELECT DISTINCT acres FROM park ORDER BY acres DESC") or die(mysqli_error($conn));
$scientific_names = mysqli_query($conn, "SELECT DISTINCT scientificName FROM species WHERE category = \"Mammal\"") or die(mysqli_error($conn));
$state_names = mysqli_query($conn, "SELECT DISTINCT state FROM park WHERE LENGTH(state) < 3") or die(mysqli_error($conn));
$park_names_2 = mysqli_query($conn, "SELECT DISTINCT parkName FROM park") or die(mysqli_error($conn));
$category_names_2 = mysqli_query($conn, "SELECT DISTINCT category FROM species") or die(mysqli_error($conn));
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

                <select name="park">
                <option value = ""> Select... </option>
                <?php
                while($rows = $park_names->fetch_assoc())
                {
                        $name = $rows['parkName'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit" name="submit" formaction="juliaDynamicResponse1.php"/>
</fieldset>


<br><br>
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


<br><br>
<?php
echo "Select a mammal (scientific) name to see the parks in which it is present.";
?>	
<fieldset>
        <form id = "dynamicQuery3" method="post" action="louisDynamicResponse1.php">
                <?php
                        if(isset($_POST['submit3']))
                        {
                                if (isset($error))
                                {
                                        echo $error;
                                }
                        }
                ?>

                <select name="scientificName">
                <option value = ""> Select... </option>
                <?php
                while($rows = $scientific_names->fetch_assoc())
                {
                        $name = $rows['scientificName'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit" name="submit3" formaction = "/louisDynamicResponse1.php" />
</fieldset>


<br><br>
<?php
echo "Select a state to see the largest park located there.";
?>
<fieldset>
        <form id = "dynamicQuery4" method="post" action="louisDynamicResponse2.php">
                <?php
                        if(isset($_POST['submit4']))
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
                while($rows = $state_names->fetch_assoc())
                {
                        $name = $rows['state'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
                </select>
        <input type="submit" value="Submit" name="submit4" formaction = "/louisDynamicResponse2.php" />
</fieldset>


<br><br>
<?php
  echo "Select a park and category to see native vs non-native species";
?>
<fieldset>
        <form id = "dynamicQuery5" method="post" action="chinyeDynamicResponse1.php">
                <?php
                        if(isset($_POST['submit5']))
                        {
                                if (isset($error))
                                {
                                        echo $error;
                                }
                        }
                ?>

                <select name="park2">
                <option value = ""> Select... </option>
                <?php
                while($rows = $park_names_2->fetch_assoc())
                {
                        $name = $rows['parkName'];
                        echo "<option value='$name'>$name</option>";
                }
                ?>
		</select>
		<select name="category2">
		<option value = "">Select...</option>
		<?php
		while($rows = $category_names_2->fetch_assoc())
		{
			$name = $rows['category'];
			echo "<option value='$name'>$name</option>";
		}
		?>
		</select>
        <input type="submit" value="Submit" name="submit5" formaction="/chinyeDynamicResponse1.php" />
</fieldset>

<br><br><a href='/index.html'>Go to Home Page</a><br>

</body>
</html>
