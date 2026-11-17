
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

    // Delete all cities of France
    $sql = $conn->prepare(
        "DELETE FROM city WHERE CountryCode = :cc"
    );

    // Bind parameters
    $countrycode = "RUS";
    $sql->bindParam(":cc", $countrycode);

    $sql->execute();

    $num = $sql->rowCount();

    echo "<br>Number of deleted Records: $num";

} catch(PDOException $e) {

    echo "Connection failed: " . $e->getMessage();

}

// Close
$conn = null;

?>