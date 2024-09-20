<?php include('db.php'); ?>

<?php
$id = $_GET['id'];
$sql = "DELETE FROM categories WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
}
?> 