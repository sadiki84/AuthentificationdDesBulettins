<?php
session_start();

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    || empty($_POST['nom']) || empty($_POST['message'])) {
    echo "Veuillez remplir correctement tous les champs";
    exit;
}

try {
    $mysql = new PDO(
        'mysql:host=localhost;dbname=epst;charset=utf8',
        'root',
        ''
    );
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = htmlspecialchars($_POST['email']);
    $nom = htmlspecialchars($_POST['nom']);
    $message = htmlspecialchars($_POST['message']);

    $stmt = $mysql->prepare("INSERT INTO contact (email, nom, message) VALUES (:email, :nom, :message)");
    $success = $stmt->execute([
        'email' => trim($email),
        'nom' => trim($nom),
        'message' => trim($message),
    ]);

    if ($success) {
        // Succès → message de confirmation
        $_SESSION['success'] = "Félicitations, votre formulaire a été envoyé !";
        header("Location: ../contact.php");
        exit;
    } else {
        // Échec → message d’erreur
        header("Location: ../contact.php?error=notfound");
        exit;
    }
}
catch (Exception $e) {
    echo "Erreur lors de l'enregistrement : " . $e->getMessage();
}
