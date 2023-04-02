<?php
// Get the posted data from the form
$faculty = $_POST['faculty'];
$subject = $_POST['subject'];
$date = $_POST['date'];
$time = $_POST['time'];

// Open a connection to the database
$db = new mysqli('localhost', 'username', 'password', 'database_name');

// Check for errors
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

// Prepare the SQL statement to insert the data
$stmt = $db->prepare("INSERT INTO announcements (faculty, subject, date, time) VALUES (?, ?, ?, ?)");

// Bind the parameters to the statement
$stmt->bind_param("ssss", $faculty, $subject, $date, $time);

// Execute the statement and check for errors
if ($stmt->execute() === false) {
  die("Error inserting data: " . $stmt->error);
}

// Close the statement and database connection
$stmt->close();
$db->close();
?>
