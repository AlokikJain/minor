<?php

require_once("pages/layout.php");

if ($_SERVER["REQUEST_METHOD"] == "GET")
renderPage("prescription");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	require("dbconfig.php");

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$Name = $_POST['search'];
	$sql = 'SELECT Name FROM search WHERE Name LIKE"'.$Name. '%"';
	$result = $conn->query($sql);


	echo "<ul>";

//Fetching result from database.

while($Result = $result->fetch_assoc()) {

?>
<li onclick='fill("<?php echo $Result['Name']; ?>")'>

<a>

<!-- Assigning searched result in "Search box" in "search.php" file. -->

<?php echo $Result['Name']; ?>

</li></a>

<!-- Below php code is just for closing parenthesis. Don't be confused. -->

<?php

}}


?>

</ul>
