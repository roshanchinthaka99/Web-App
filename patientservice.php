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

// Fetch services
$sql = "SELECT serviceID, name, description, price FROM services";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Services</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .header {
            background: #5e2ff8;
            color: white;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px 10px 0 0;
            margin: 10px auto;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .back-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 5px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

<div class="header">
    <h2>Available Services</h2>
</div>

<div class="container">

    <table>
        <tr>
            <th>Service ID</th>
            <th>Service Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['serviceID']) . "</td>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['description']) . "</td>
                        <td>$" . number_format($row['price'], 2) . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No services available</td></tr>";
        }
        ?>
    </table>

    <a href='patientdashboard.php' class='back-btn'>Back</a>

</div>

</body>
</html>

<?php
$conn->close();
?>