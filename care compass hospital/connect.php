<?php
$servername = "gateway01.ap-northeast-1.prod.aws.tidbcloud.com";
$username = "YWvB1zd1UBmYBSf.root";
$password = "zOV9rH1DnEIfaLI2";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
