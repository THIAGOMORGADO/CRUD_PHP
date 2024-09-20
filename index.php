<?php include('db.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Categorias</title>
    <link rel="stylesheet" href="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css
">
</head>
<body>
<div class="container">
    <h1 class="my-4">Categorias</h1>
    <a href="create.php" class="btn btn-primary mb-4">Adicionar Categoria</a>
    <a href="create.php" class="btn btn-dark mb-4">Adicionar Produto</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ativo</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM categories";
            $stmt = $conn->query($sql);
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($categories as $category) {
                echo "<tr>";
                echo "<td>{$category['id']}</td>";
                echo "<td>{$category['name']}</td>";
                echo "<td>{$category['description']}</td>";
                echo "<td>" . ($category['active'] ? 'Sim' : 'Não') . "</td>";
                echo "<td>{$category['create_at']}</td>";
                echo "<td>{$category['updated_at']}</td>";
                echo "<td>
                    <a href='edit.php?id={$category['id']}' class='btn btn-warning'>Editar</a>
                    <a href='delete.php?id={$category['id']}' class='btn btn-danger'>Deletar</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html> 