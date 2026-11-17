
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
	$name = "Esgos";
    $countrycode = "ESP";
    $popu = 1500;
	
    $sql = $conn->prepare(
        "INSERT INTO city (Name, CountryCode, Population)
         VALUES (?, ?, ?)"
    );

    // Execute with positional parameters
    $sql->execute([$name, $countrycode, $popu]);

    echo "Record inserted";

}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close connection
$conn = null;

?>