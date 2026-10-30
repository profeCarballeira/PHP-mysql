<?php
$servername = "mysql";
$username = "martin";
$password = "abc123.";
$dbname = "world";

//REMEMBER: keywords in SQL ar not CASESEMSITIVE, but OBJECT NAMES (tables, rows....) ARE

try {
  //1. Open
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";

  //2. Process
  $sql =  "SELECT * from city";

  $result = $conn->query ($sql);

  foreach ($result as $row){
    echo $row["Name"] . " " . $row["Population"] . "<br>";
  }

} catch(PDOException $e) {
  echo "Con
  nection failed: " . $e->getMessage();
}

//3. Close
$conn->Close();
// $conn = null

?>