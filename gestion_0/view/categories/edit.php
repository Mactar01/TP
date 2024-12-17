<?php

require_once 'controller/categoriesController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $categoriesController = new CategoriesController();
    $categories = $categoriesController->listCategories();
    $categoryToEdit = null;

    foreach ($categories as $category) {
        if ($category['id'] == $id) {
            $categoryToEdit = $category;
            break;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $libelle = $_POST['libelle'];
        $categoriesController->editCategory($id, $libelle);

        header('Location: index_categories.php');
    }
} else {
    header('Location: index_categories.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une catégorie</title>
</head>
<body>
    <h1>Modifier la catégorie</h1>
    <?php if ($categoryToEdit): ?>
        <form method="POST">
            <label for="libelle">Libellé:</label>
            <input type="text" name="libelle" value="<?= $categoryToEdit['libelle'] ?>" required><br>

            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p>La catégorie n'existe pas.</p>
    <?php endif; ?>
</body>
</html>
