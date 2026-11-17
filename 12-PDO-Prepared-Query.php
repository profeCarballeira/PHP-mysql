<?php

$servername = "mysql";
$username = "martin";
$password = "abc123.";
$dbname = "world";

// REMEMBER: SQL keywords are not case sensitive,
// but OBJECT NAMES (tables, rows...) ARE

try {

    // 1. Open
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Process

    // Prepare SQL statement
    $sql = $conn->prepare(
        "SELECT city.Name, city.Population
         FROM city
         INNER JOIN country ON city.CountryCode = country.Code
         WHERE country.Name = :country"
    );

    // Bind parameters
    $country = "Spain";
    $sql->bindParam(":country", $country);

    // Execute
    $sql->execute();

    // Fetch results
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Display results
    foreach ($result as $row) {

        echo $row["Name"] . " " . $row["Population"] . "<br>";

    }

} catch(PDOException $e) {

    echo "Connection failed: " . $e->getMessage();

}

// 3. Close
$conn = null;

?>