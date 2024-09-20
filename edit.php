<?php include('db.php'); ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM categories WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$category = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $active = isset($_POST['active']) ? 1 : 0;
    $updated_at = date('Y-m-d H:i😒');

    $sql = "UPDATE categories SET name = :name, description = :description, active = :active, updated_at = :updated_at WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':active', $active);
    $stmt->bindParam(':updated_at', $updated_at);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css
">
</head>
<body>
<div class="container">
    <h1 class="my-4">Editar Categoria</h1>
    <form action="edit.php?id=<?= $category['id'] ?>" method="POST">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $category['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description" required><?= $category['description'] ?></textarea>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="active" name="active" <?= $category['active'] ? 'checked' : '' ?>>
            <label class="form-check-label" for="active">Ativo</label>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
</body>
</html> 