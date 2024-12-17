<?php

require_once 'controller/categoriesController.php';

$categoriesController = new CategoriesController();
$categories = $categoriesController->listCategories();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des catégories</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Liste des catégories</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Libellé</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= $category['libelle'] ?></td>
                <td>
                    <a href="edit_category.php?id=<?= $category['id'] ?>">Modifier</a> | 
                    <a href="delete_category.php?id=<?= $category['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="add_category.php">Ajouter une catégorie</a>
</body>
</html>
