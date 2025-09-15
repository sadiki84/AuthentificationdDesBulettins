<?php
if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    || empty($_POST['password'])) {
    header("Location:../compte.php?error=empty");
    exit;
}

try {
    $mysql = new PDO(
        'mysql:host=localhost;dbname=epst;charset=utf8',
        'root',
        ''
    );
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $mysql->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([
        'email' => $email,
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {
        // Connexion réussie
        header("Location:../index.php");
        exit;
    } else {
        // Mauvais identifiants
        header("Location:../compte.php?error=notfound");
        exit;
    }
} catch (Exception $e) {
    echo "Erreur lors de la connexion : " . $e->getMessage();
}
