
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <span class="fw-bold">Ministère de l'EPST</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
</nav>

<?php /*if (!empty($error) && $error === 'wrong_password') : ?>
    <div class="alert alert-danger">
        Veuillez saisir correctement votre mot de passe.
    </div>
<?php endif; */?>


<?php //formulaire de connexion?>

      <section class="container my-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6 form-container">
        <h2 class="mb-4">Bienvenue sur notre site</h2>
        
        <?php //formulaire ?>
        <form action="src/authentification.php" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Votre email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Votre mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" minlength="8" required>
          </div>
<?php /*confirmation du mot de passe saisi
          <div class="mb-3">
            <label for="confirm" class="form-label">Confirmez votre mot de passe</label>
            <input type="password" class="form-control" id="confirm" name="confirm" required>
          </div>*/?>
          <div class="mb-3">
            <label for="nom" class="form-label">Votre nom complet</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>
          <div class=   "mb-3">
            <label for="school" class="form-label">Nom de l'ecole actuelle</label>
            <input type="text" class="form-control" id="school" name="school" required>
          </div>
          <div class="mb-3">
            <label for="annee" class="form-label">Année scolaire</label>
            <input type="text" class="form-control" id="annee" name="annee" placeholder="ex: 2022-2023" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">
            <i class="verifier bi-search"></i> S'inscrire
          </button>
        </form>
        <div class="row justify-content-center align-items-center">
            <div class="mb-12">
                <a href="compte.php" >se connecter</a>
            </div>
        </div>
      </div>

  </section>
</body>
</html>