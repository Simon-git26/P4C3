<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <!-- Navigation -->
        <?php include_once('header.php'); ?>

        <!-- Formulaire de connexion -->
        <?php include_once('login.php'); ?>

        <?php if (isset($loggedUser)) : ?>

            <h1>Site de Recettes !</h1>

            <!-- Plus facile à lire -->
            <?php foreach (get_recipes($recipes, $limit) as $recipe) : ?>
                <article class="mb-5">
                    <h3><a href="./recipes/read.php?id=<?php echo ($recipe['recipe_id']); ?>"><?php echo ($recipe['title']); ?></a></h3>
                    <div><?php echo ($recipe['recipe']); ?></div>
                    <i><?php echo (display_author($recipe['author'], $users)); ?></i>

                    <!-- Afficher un bouton Editer (dans un form en methode GET) SI le user connecté === à l'auteur de la recette -->
                    <?php if ($_SESSION['LOGGED_USER'] === $recipe['author']) : ?>
                        <div class="d-flex">
                            <form action="<?php echo ($rootUrl . 'recipes/update.php'); ?>" method="GET">
                                <!-- Modification de la recette en envoyant son id -->
                                <div class="mb-3 visually-hidden">
                                    <label for="id" class="form-label">Identifiant de la recette</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo ($recipe['recipe_id']) ?>">
                                </div>
                                <button type="submit" class=" btn btn-primary">Editer</button>
                            </form>

                            <form action="<?php echo ($rootUrl . 'recipes/delete.php'); ?>" method="GET">
                                <!-- Modification de la recette en envoyant son id -->
                                <div class="mb-3 visually-hidden">
                                    <label for="id" class="form-label">Identifiant de la recette</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo ($recipe['recipe_id']) ?>">
                                </div>
                                <button type="submit" class=" btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    <?php endif; ?>

                </article>
            <?php endforeach ?>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>