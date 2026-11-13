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
 //UPDATE `city` SET `Name` = 'Mordor' WHERE `city`.`ID` = 5;
 //$sql = "UPDATE city SET Name ='AmsterdanAgain' WHERE id =5";

 //add Kabul city to Spain
 //$sql = "UPDATE city SET CountryCode = 'ESP' WHERE Name = 'Kabul'";
 
 //Conquer Italy cities (change CountryCode from Morocco to Spain)
 //$sql = "UPDATE city SET CountryCode = 'ESP' WHERE CountryCode = 'MAR'";

 //incremente a 10% the population of all Portugese cities
 $sql = "UPDATE city SET Population = Population+(0.1*Population) WHERE CountryCode = 'PRT'";

  echo $sql; //little debug
  $num = $conn->exec ($sql);
  echo "<br>Number of UPDATED Records: $num";

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//Close
$conn = null

?>