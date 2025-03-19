<?php
include '../includes/db.php'; // Database connection

$note_id = $_GET['id'];
$sql = "DELETE FROM notes WHERE note_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $note_id);
$stmt->execute();

header("Location: view_notes.php");
?>
