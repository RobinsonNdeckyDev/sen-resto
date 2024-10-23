<?php
session_start();
require_once '../config/config.php';

// $imagePath = BASE_URL . htmlspecialchars($recipe['image_path']);
// echo "<!-- Image Path: $imagePath -->";

// var_dump($recipes);
// print_r($users);




// Vérifier s'il y a un message toast à afficher
if (isset($_SESSION['toast'])) {
    $toastMessage = $_SESSION['toast']['message'];
    $toastType = $_SESSION['toast']['type'];
    showToastWithRedirect($toastMessage, $toastType, 3000);
    unset($_SESSION['toast']);
}

// Récupérer les recettes actives
$activeRecipes = getActiveRecipes();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet">
    <!-- Inclure Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet" href="../styles/main.css">
    <title>Sen recette</title>
</head>

<body class="border min-vh-100">
    <!-- Navbar -->
    <?php require_once '../components/navbar.php' ?>

    <div class="caroussel">
        <img src="../assets/images/top-view-food-ingredients-with-veggies-notebook.jpg" style="height: 80vh !important;" class="img-fluid" alt="">
    </div>

    <h2 class="text-center my-8">Liste des recettes</h2>

    <?php if (!empty($activeRecipes)): ?>
        <section class="my-10">
            <div class="container">
                <div class="row p-0 my-5">
                    <div class="col-12 col-md-3">
                        <h3>Filtres</h3>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="row m-0">
                            <?php foreach ($activeRecipes as $recipe): $imagePath = BASE_URL . htmlspecialchars($recipe['image_path'] ?? '');  ?>

                                <div class="col-12 col-md-6 g-3">
                                    <div class="card h-100">
                                        <div class="card-header d-flex align-items-center">

                                            <?php
                                            // $user_found = false;
                                            foreach ($users as $user) {
                                                if ($user['email'] == $recipe['author']) {
                                                    // $user_found = true;
                                                    if ($user['image_path'] !== null && $user['nom'] !== null) {
                                            ?>
                                                        <img src="<?php echo BASE_URL . ($user['image_path'].'../'); ?>" alt="<?php echo htmlspecialchars($user['nom']); ?>" width="36" height="36" class="rounded-circle shadow" />
                                                <?php
                                                    }
                                                    break;
                                                }
                                            }
                                            
                                            ?>
                                            <!-- <span class="avatar text-bg-primary avatar-lg fs-5">R</span> -->
                                            <div class="ms-3">
                                                <h6 class="mb-0 fs-sm"><?php echo displayAuthor($recipe['author'], $users); ?></h6>
                                                <span class="text-muted fs-sm"><?php echo $recipe['created_at']; ?></span>
                                            </div>
                                        </div>

                                        <img src="<?php echo htmlspecialchars($recipe['image_path'] ?: BASE_URL . 'assets/images/top-view-food-ingredients-with-veggies-notebook.jpg'); ?>" alt="recip img" class="" style="height: 260px;" ?>

                                        <div class="card-body">
                                            <h3 class="my-4">
                                                <a href="<?php echo BASE_URL; ?>pages/detailRecette.php?id=<?php echo htmlspecialchars($recipe['recipe_id']); ?>">
                                                    <?php echo htmlspecialchars($recipe['title']); ?>
                                                </a>
                                            </h3>
                                            <p class="card-text"><?php echo $recipe['recipe']; ?></p>
                                        </div>
                                        <div class="card-footer d-flex">
                                            <a class="btn btn-info me-auto fw-bold" href="<?php echo BASE_URL; ?>pages/detailRecette.php?id=<?php echo htmlspecialchars($recipe['recipe_id']); ?>">Voir plus</a>
                                            <?php if ($_SESSION['LOGGED_USER']['email'] === $recipe['author']) : ?>
                                                <a class="btn btn-warning me-auto fw-bold text-white" href="<?php echo BASE_URL; ?>pages/update_recette.php?id=<?php echo htmlspecialchars($recipe['recipe_id']); ?>">Modifier</a>
                                                <a class="btn btn-info me-auto fw-bold" href="<?php echo BASE_URL; ?>pages/deleted_recette.php?id=<?php echo htmlspecialchars($recipe['recipe_id']); ?>">Supprimer</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Footer -->
    <?php require_once '../components/footer.php' ?>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Inclure Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>