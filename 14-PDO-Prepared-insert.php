
<?php

$servername = "mysql";
$username = "martin";
$password = "abc123.";
$myDB = "world";

try {

    // Open connection
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    $conn->exec("set names utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement
    $sql = $conn->prepare(
        "INSERT INTO city (Name,CountryCode,Population)
         VALUES (:n, :cc, :p)"
    );

    // Bind parameters
    $sql->bindParam(":n", $name);
    $sql->bindParam(":cc", $countrycode);
    $sql->bindParam(":p", $popu);

    // Insert Esgos
    $name = "Esgos";
    $countrycode = "ESP";
    $popu = 1500;

    $sql->execute();

    echo "<br>Record inserted";

}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>
