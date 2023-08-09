<?php
$servername = "localhost";
$username = "u657512357_testcolordb";
$password = "Eniyan@13";
$dbname = "u657512357_testcolordb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the color code from the database
    $stmt = $conn->query("SELECT color_code_e FROM lettere WHERE id = 1");
    $colorCode = $stmt->fetchColumn();

    echo $colorCode;
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
