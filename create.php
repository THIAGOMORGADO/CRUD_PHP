<?php include('db.php'); ?>

<?php
// Pegando dados do campos do formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $active = isset($_POST['active']) ? 1 : 0;
    $create_at = date('Y-m-d H:i😒');

    // Validando dados do formulario
    $sql = "INSERT INTO categories (name, description, active, create_at) VALUES (:name, :description, :active, :create_at)";
    $stmt = $conn->prepare($sql);

    // Protegendo query de sql injection 
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':active', $active);
    $stmt->bindParam(':create_at', $create_at);

    // Executando a query redirecinando usuario par a index
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
    <title>Adicionar Categoria</title>
    <link rel="stylesheet" href="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css
">
</head>
<body>
<div class="container">
    <h1 class="my-4">Adicionar Categoria</h1>
    <form action="create.php" method="POST">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="active" name="active">
            <label class="form-check-label" for="active">Ativo</label>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
</body>
</html> 