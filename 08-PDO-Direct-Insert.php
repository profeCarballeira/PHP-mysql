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

  //1 copy the template form phpmyadmin
  //INSERT INTO `city` (`ID`, `Name`, `CountryCode`, `District`, `Population`) VALUES (NULL, 'Morgade', 'ESP', '', '23');
  //$sql = "INSERT INTO city (Name, CountryCode, Population) VALUES ('Lobios', 'ESP','202')";

  // 2 set a sentence eith previous variables
  // $nameOfCity = "Cambeo";
  // $popu = 401;
  // $codeCounty = "ESP";
  // $sql = "INSERT INTO city (Name, CountryCode, Population) 
  //           VALUES ('" . $nameOfCity . "', '" . $codeCounty . "','" . $popu . "')";

  // 3 insert in the city table with data from form
  if (isset ($_GET['vill']) and isset($_GET['popu'])){
    $sql = "INSERT INTO city (Name, CountryCode, Population) 
        VALUES ('" . $_GET['vill'] . "','ESP'," .$_GET['popu']. ")";
    }


  echo $sql; //little debug
  $conn->exec($sql);
  echo "<br>Record inserted";

} catch(PDOException $e) {
  echo "Con
  nection failed: " . $e->getMessage();
}

//Close
$conn = null

?>