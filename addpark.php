<br><br>
<table border="1" align="center">
<tr>
    <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Park Code  </td>
    <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Park Name  </td>
    <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> State Abbrev.  </td>
    <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Acres  </td>
    <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Latitude  </td>
    <td style="font-weight: bold;background-color:#C8EAD9;height:45px;"> Longitude  </td>
</tr>


<?php
if (isset($_POST['add']))
{
  if (!$_POST['park_code'] or !$_POST['park_name'] or !$_POST['state'] or !$_POST['acres'] or !$_POST['lat'] or !$_POST['long']){
	  echo "Please fill in all form fields to add data. Returning to add data screen in 5 seconds.";
	  echo "<meta http-equiv=\"Refresh\" content=\"5; url='/insert.php'\"/>";
	  exit();
  } else
  {
	  $park_code = $_POST['park_code'];
	  $park_name = $_POST['park_name'];
	  $state = $_POST['state'];
	  $acres = $_POST['acres'];
	  $lat = $_POST['lat'];
	  $long = $_POST['long'];
  }

  $servername = "localhost";
  $username = "root";
  $password = "maple";
  $db = "final";
  $conn = new mysqli($servername, $username, $password, $db);
  if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
  }
  $query_contents = "INSERT INTO faketable (parkCode, parkName, state, acres, latitude, longitude) VALUES ('$park_code', '$park_name', '$state', '$acres', '$lat', '$long')";

  if (!mysqli_query($conn, $query_contents)) {
    die(mysqli_error($conn));
  } else {
    echo "Data has been added.";
  }
  
  $query_check = mysqli_query($conn, "SELECT * FROM faketable WHERE parkCode = \"{$park_code}\"");
  while ($row = mysqli_fetch_array($query_check)) 
  {
  echo
    "<tr>
     <td>{$row['parkCode']}</td>
     <td>{$row['parkName']}</td>
     <td>{$row['state']}</td>
     <td>{$row['acres']}</td>
     <td>{$row['latitude']}</td>
     <td>{$row['longitude']}</td>
     </tr>";
  }
}
?>

<?php
if (isset($_POST['remove']))
{
  if (!$_POST['park_code'])
  {
	  echo "Park Code is a required field. Returning to add data screen in 5 seconds.";
	  echo "<meta http-equiv=\"Refresh\" content=\"5; url='/insert.php'\"/>";
	  exit();
  }
  else
  {
          $park_code = $_POST['park_code'];
  }

  $servername = "localhost";
  $username = "root";
  $password = "maple";
  $db = "final";
  $conn = new mysqli($servername, $username, $password, $db);
  if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
  }
  $query_contents = "DELETE FROM faketable WHERE parkCode = \"$park_code\"";

  if (!mysqli_query($conn, $query_contents)) {
        die(mysqli_error($conn));
                    } else {
                                  echo "Data has been removed.";
                                      }
  $query_check = mysqli_query($conn, "SELECT * FROM faketable WHERE parkCode = \"{$park_code}\"");
  while ($row = mysqli_fetch_array($query_check))
  {
  echo
      "<tr>
      <td>{$row['parkCode']}</td>
      <td>{$row['parkName']}</td>
      <td>{$row['state']}</td>
      <td>{$row['acres']}</td>
      <td>{$row['latitude']}</td>
      <td>{$row['longitude']}</td>
      </tr>";
  }
}
?>

