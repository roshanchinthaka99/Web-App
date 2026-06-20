<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Care Compass Hospital";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $staffID = $_POST['staffID'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

   
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!'); window.location.href='addstaff.html';</script>";
        exit();
    }

    
    $sql = "INSERT INTO staffdetails (firstname, lastname, staffID, phonenumber, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

 
    $stmt->bind_param("sssss", $firstname, $lastname, $staffID, $phonenumber, $password);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='../Admin/admindashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='addstaff.html';</script>";
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

