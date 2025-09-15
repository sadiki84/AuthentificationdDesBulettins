<?php
try {
    $mysql = new PDO(
        'mysql:host=localhost;dbname=epst;charset=utf8',
        'root',
        ''
    );
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $mysql->prepare("SELECT * FROM bulletin WHERE nom = :nom AND numero = :numero AND annee= :annee");
    $stmt->execute([
        'nom' => $nom,
        'numero' => $numero,
        'annee' => $annee,
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Erreur lors de la connexion : " . $e->getMessage();
}