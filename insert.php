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

<br><br>
<a href='/index.html'>Go to Home Page</a><br/>
<br><br>

</body>
</html>
