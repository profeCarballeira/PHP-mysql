<?php
$servername = "mysql";
$username = "martin";
$password = "abc123.";
$dbname = "world";

try {
  //Open
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";

  //Process
  $cod= $_GET["countryCode"];
  //$sql ="DELETE FROM city WHERE CountryCode='FRA'";
  $sql ="DELETE FROM city WHERE CountryCode= '$cod'";

  echo $sql; //little debug
  $num = $conn->exec ($sql);
  echo "<br>Number of deleted Records: $num";

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//Close
$conn = null

?>