<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Care Compass Hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $patientID = $_POST['patientID'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!'); window.location.href='addpatients.html';</script>";
        exit();
    }

    
    $sql = "INSERT INTO patientdetails (firstname, lastname, patientID, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters for the SQL query
    $stmt->bind_param("ssss", $firstname, $lastname, $patientID, $password);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='../Admin/admindashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='addpatients.html';</script>";
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

