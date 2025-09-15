<?php
session_start();

// Récupère en toute sécurité la variable ou null
$bulletin = $_SESSION['bulletin'] ?? null;

// Si on arrive ici sans bulletin en session, rediriger ou afficher un message
if (!$bulletin) {
    // Option A : rediriger vers le formulaire
    header("Location: verifier.php?error=accessdenied");
    exit;

    // Option B (alternative) : afficher un message positif et ne pas arrêter le script :
    // echo "<p class='text-danger'>Aucun bulletin à afficher. Retournez au formulaire.</p>";
    // exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Résultat de vérification - Ministère de l'EPST</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="resultat.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <span class="fw-bold">Ministère de l'EPST</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="verifier.php">Vérification</a></li>
          <li class="nav-item"><a class="nav-link" href="resultat.php">Résultat</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <section class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-body">
            <div class="d-flex align-items-center mb-3">
              <i class="bi bi-patch-check-fill text-success display-5 me-3"></i>
              <h3 class="mb-0">Résultat : Bulletin valide</h3>
            </div>
            <p class="mb-4">Le bulletin est authentique et délivré par le Ministère de l'EPST.</p>
            <div class="table-responsive mb-3">
              <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th>Nom</th>
                    <th>code</th>
                    <th>Année</th>
                    <th>Moyenne</th>
                    <th>Statut</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= htmlspecialchars($bulletin['nom']) ?></td>
                    <td><?= htmlspecialchars($bulletin['numero']) ?></td>
                    <td><?= htmlspecialchars($bulletin['annee']) ?></td>
                    <td><?= htmlspecialchars($bulletin['moyenne']) ?></td>
                    <td><?php if ($bulletin['moyenne'] >= 10): ?>
              <span class="badge bg-success">Validé</span>
            <?php else: ?>
              <span class="badge bg-danger">Échec</span>
            <?php endif; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <a href="download\C#.pdf" download="C#.pdf" class="btn btn-outline-primary">
              <i class="pdf bi-file-earmark-pdf"></i> Télécharger (PDF)
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-light text-center text-lg-start border-top mt-5">
    <div class="container p-4">
      <div class="row">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h5 class="mb-2">Ministère de l'EPST</h5>
          <p>Authenticité des bulletins scolaires - Lutte contre la fraude.</p>
        </div>
        <div class="col-lg-3 mb-4 mb-lg-0">
          <h6>Liens rapides</h6>
          <ul class="list-unstyled mb-0">
            <li><a href="index.html" class="text-dark lien-footer">Accueil</a></li>
            <li><a href="verifier.html" class="text-dark lien-footer">Vérification</a></li>
            <li><a href="resultat.html" class="text-dark lien-footer">Résultat</a></li>
            <li><a href="contact.html" class="text-dark lien-footer">Contact</a></li>
          </ul>
        </div>
        <div class="col-lg-3 mb-4 mb-lg-0">
          <h6>Contact</h6>
          <p>Email : calebsadiki@gmail.com<br>Tél : +243 896 420 522</p>
        </div>
      </div>
    </div>
    <div class="text-center p-3 bg-dark text-white">
      © 2024 Ministère de l'EPST. Tous droits réservés.
    </div>
  </footer>

  <script src="bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>