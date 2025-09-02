<?php
include 'connect.php';

// Check if userID is provided
if (isset($_GET['patientID'])) {
    $patientID = $_GET['patientID'];

    $stmt2 = $conn->prepare("DELETE FROM patientdetails WHERE patientID = ?");
    $stmt2->bind_param("s", $patientID);
    $stmt2->execute();
    
    if ($stmt1->affected_rows > 0 || $stmt2->affected_rows > 0) {
        echo "<script>alert('Patient removed successfully.'); window.location.href='adminselectpatients.php';</script>";
    } else {
        echo "<script>alert('Error: Patient not found.'); window.location.href='adminselectpatients.php';</script>";
    }

    $stmt1->close();
    $stmt2->close();
}

$conn->close();
?>
