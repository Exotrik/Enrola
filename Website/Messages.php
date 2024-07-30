<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "enrola"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$nome = $_POST['nome'];
$email = $_POST['email'];
$yes_or_no = $_POST['yes_or_no'];
$campanha = $_POST['campanha'];
$informacoes_adicionais = $_POST['informacoes_adicionais'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO mensagens (nome, email, yes_or_no, campanha, informacoes_adicionais) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nome, $email, $yes_or_no, $campanha, $informacoes_adicionais);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
