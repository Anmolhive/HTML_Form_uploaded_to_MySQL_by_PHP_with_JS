<?php

if(isset($_POST['name']) && isset($_POST['mobile'])) // Check For $_POST element not empty.
{
    $name = $_POST['name']; // Storing Element.
    $mobile = $_POST['mobile']; // Storing Element.
    $conn = new mysqli("localhost", "root", "", "form");  // Sql Connection
    if ($conn->connect_errno) { // Checking sql Connection.
        echo "Failed to connect to MySQL: " . $conn->connect_error . "<br>";
        exit();
    }

    $sql = "INSERT INTO form VALUES ('', '$name', '$mobile')";  // SQL Insert Query.

    if ($conn->query($sql) === TRUE) { // Checking Insert Query not fail.
        echo "<b>Form Submit Successfully.</b>"; // Echo Statement Which Inserted into Span.
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
