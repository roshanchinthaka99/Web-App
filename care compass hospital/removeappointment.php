<?php
include 'connect.php';

// Check if ID is provided
if (isset($_GET['id'])) {
    $appointmentID = intval($_GET['id']);

    // Delete query
    $sql = "DELETE FROM appointments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $appointmentID);

    if ($stmt->execute()) {
        echo "<script>alert('Appointment deleted successfully!'); window.location='admindashboard.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "<script>alert('No appointment ID provided!'); window.location='admindashboard.php';</script>";
}

$conn->close();
?>
