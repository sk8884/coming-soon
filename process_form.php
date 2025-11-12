<?php
$servername = "localhost";
$username = "skapscor_admin";
$password = "Sukesh@28";
$dbname = "skapscor_leads";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$id = "SK_Lead" + "SELECT COUNT(*) AS count FROM Leads";
echo $id;
// Prepare and bind
$stmt = $conn->prepare("INSERT INTO Leads (Lead ID, Name, Phone, Email) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ss", $id, $name, $phone, $email);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
