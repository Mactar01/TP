<?php

require_once 'controller/categoriesController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $libelle = $_POST['libelle'];

    $categoriesController = new CategoriesController();
    $categoriesController->addCategory($libelle);

    header('Location: index_categories.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une catégorie</title>
</head>
<body>
    <h1>Ajouter une catégorie</h1>
    <form method="POST">
        <label for="libelle">Libellé:</label>
        <input type="text" name="libelle" required><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
