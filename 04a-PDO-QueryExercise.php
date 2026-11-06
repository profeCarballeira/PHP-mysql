<?php
//cities with more than a million population where English is officially spoken and they are outside of America
$servername = "mysql";
$username = "martin";
$password = "abc123.";
$dbname = "world";

//REMEMBER: keywords in SQL ar not CASESENSITIVE, but OBJECT NAMES (tables, rows....) ARE

try {
  //1. Open
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";

  //2. Process
  $sql = "SELECT country.Name as pais, city.Name as ciudad FROM ((countrylanguage join 	country ON countrylanguage.CountryCode=country.Code) JOIN city on city.CountryCode=country.code) WHERE countrylanguage.Language = 'English' and city.Population > 1000000 and countrylanguage.IsOfficial = True and country.Continent not in ('North America', 'South America')";
  $result = $conn->query($sql);

  foreach ($result as $tupla){
      echo "<b>" . $tupla["ciudad"] . "</b>" ." " . $tupla["pais"] . "<br>";
  }
    

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//3. Close
//$conn->Close();
$conn = null

?>