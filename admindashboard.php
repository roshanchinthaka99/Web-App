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

// Function to safely fetch count
function fetchCount($conn, $table) {
    $result = $conn->query("SELECT COUNT(*) AS count FROM $table");
    if ($result) {
        return $result->fetch_assoc()['count'];
    } else {
        return 0;
    }
}

// Fetch counts
$doctorCount = fetchCount($conn, "doctordetails");
$patientCount = fetchCount($conn, "patientdetails");
$appointmentCount = fetchCount($conn, "appointments");
$staffCount = fetchCount($conn, "staffdetails");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body{ 
            font-family: Arial, sans-serif;
            color: white;
            background: #c8d7e0;
        }
        .title{
            background: #5e2ff8;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center; 
            border-radius: 10px 10px 0 0;  
        }
        .dashboard { 
            display: flex; 
            gap: 20px; 
            margin: 50px auto;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1200px;
        }
        .card { 
            padding: 20px; 
            background: rgb(82, 75, 163); 
            border-radius: 10px;
            width: 250px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 120px;
        }
        .btn-container {
            display: flex; 
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .btn a button {
            padding: 10px 15px;
            background: #5e2ff8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .btn a button:hover {
            background: #3c1eb4;
        }
    </style>
</head>
<body>
    <div class="title">
        <h2>Admin Dashboard</h2>
    </div>
    <div class="dashboard">
        <div class="card">
            <h3>Doctors</h3>
            <p>Total: <?php echo $doctorCount; ?></p>
        </div>
        <div class="card">
            <h3>Patients</h3>
            <p>Total: <?php echo $patientCount; ?></p>
        </div>
        <div class="card">
            <h3>Appointments</h3>
            <p>Total: <?php echo $appointmentCount; ?></p>
        </div>
        <div class="card">
            <h3>Staff</h3>
            <p>Total: <?php echo $staffCount; ?></p>
        </div>
    </div>

    <div class="btn-container">
        <div class="btn">
            <a href="addpatients.html"><button>Add Patients</button></a>
        </div>
        <div class="btn">
            <a href="adddoctors.html"><button>Add Doctors</button></a>
        </div>
        <div class="btn">
            <a href="addstaff.html"><button>Add Staff</button></a>
        </div>
        <div class="btn">
            <a href="adminselectdocs.php"><button>Manage Doctors</button></a>
        </div>
        <div class="btn">
            <a href="adminselectpatients.php"><button>Manage Patients</button></a>
        </div>
        <div class="btn">
            <a href="adminselectstaffs.php"><button>Manage Staff</button></a>
        </div>
        <div class="btn">
            <a href="manageappointment.php"><button>Manage Appointments</button></a>
        </div>
        <div class="btn">
            <a href="adminservices.php"><button>Services</button></a>
        </div>
        <div class="btn">
            <a href="#"><button>View Feedback</button></a>
        </div>
        <div class="btn">
            <a href="adminlogin.php"><button>Logout</button></a>
        </div>
    </div>
</body>
</html>

