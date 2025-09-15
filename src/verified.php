<?php

session_start();

if (empty($_POST['nom'])|| empty($_POST['numero'])
    || empty($_POST['annee'])) {
    header("Location:../verifier.php?error=empty");
    exit;
}

try {
    $mysql = new PDO(
        'mysql:host=localhost;dbname=epst;charset=utf8',
        'root',
        ''
    );
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nom = trim($_POST['nom']);
    $numero = trim($_POST['numero']);
    $annee = trim($_POST['annee']);

    $stmt = $mysql->prepare("SELECT * FROM bulletin WHERE nom = :nom AND numero = :numero AND annee= :annee");
    $stmt->execute([
        'nom' => $nom,
        'numero' => $numero,
        'annee' => $annee,
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

   if ($user) {
        // Bulletin trouvé → on redirige
        $_SESSION['bulletin'] = $user;
        header("Location:../resultat.php");
        exit;
    } else {
        // Bulletin non trouvé → message d’erreur dans l’URL
        header("Location:../verifier.php?error=notfound");
        exit;
    }
} catch (Exception $e) {
    echo "Erreur lors de la connexion : " . $e->getMessage();
}