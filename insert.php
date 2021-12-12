<html>
<body>

<fieldset>
<p style="font-weight:bold;"> Use the following form to add data to the 'parks' database. </p>
<form id="addpark" action="addpark.php" method="POST">
Park Code: <input type="text" name="park_code" required><br><br>
Park Name: <input type="text" name="park_name"><br><br>
State (Abbrev.): <input type="text" name="state"><br><br>
Acres: <input type="text" name="acres"><br><br>
Latitude: <input type="text" name="lat"><br><br>
Longitude: <input type="text" name="long"><br><br>
<input type="submit" value="Add Data" name="add">
<input type="submit" value="Remove Data" name="remove">
</form>
</fieldset>

<fieldset>
<p style="font-weight:bold;"> Use the following form to add data to the 'trails' database. </p>
<form id="addtrail" action="addtrail.php" method="POST">
Trail ID: <input type="text" name="trail_id" required><br><br>
Trail Name: <input type="text" name="trail_name"><br><br>
Park Name: <input type="text" name="p_name"><br><br>
Popularity: <input type="text" name="popularity"><br><br>
Length: <input type="text" name="length"><br><br>
Elevation Gain: <input type="text" name="elev"><br><br>
<input type="submit" value="Add Data" name="add">
<input type="submit" value="Remove Data" name="remove">
</form>
</fieldset>

<fieldset>
<p style="font-weight:bold;"> Use the following form to add data to the 'species' database. </p>
<form id="addspecies" action="addspecies.php" method="POST">
Species ID: <input type="text" name="species_id" required><br><br>
Park Name: <input type="text" name="park_name"><br><br>
Category: <input type="text" name="cat"><br><br>
Order: <input type="text" name="order"><br><br>
Family: <input type="text" name="fam"><br><br>
Scientific Name: <input type="text" name="scientific"><br><br>
Common Name: <input type="text" name="common"><br><br>
Record: <input type="text" name="record"><br><br>
Ocurrence: <input type="text" name="occurence"><br><br>
Nativeness: <input type="text" name="nativeness"><br><br>
<input type="submit" value="Add Data" name="add">
<input type="submit" value="Remove Data" name="remove">
</form>
</fieldset>

</body>
</html>
