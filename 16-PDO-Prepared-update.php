<?php

$servername = "mysql";
$username = "martin";
$password = "abc123.";
$dbname = "world";

try {

    // Open
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Process

    // Change the country code of Esgos to Portugal ('PRT')

    $sql = $conn->prepare(
        "UPDATE city
         SET CountryCode = :cc
         WHERE Name = :city"
    );

    // Bind parameters
    $countrycode = "PRT";
    $cityname = "Esgos";
    
    $sql->bindParam(":cc", $countrycode);
    $sql->bindParam(":city", $cityname);

    $sql->execute();

    $num = $sql->rowCount();

    echo "<br>Number of UPDATED Records: $num";

} catch(PDOException $e) {

    echo "Connection failed: " . $e->getMessage();

}

// Close
$conn = null;

?>
