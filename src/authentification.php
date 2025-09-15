


<?php



if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    || empty($_POST['password']) || empty($_POST['nom']) 
|| empty($_POST['school']) || empty($_POST['annee'])){
echo"Veuillez remplir correctement tous les champs";

    }

/*if ($_POST['password'] !== $_POST['confirm']){
    exit;
    if ($_POST['password'] !== $_POST['confirm']) {
    header("Location: ../login.php?error=mdp");

}


    exit;
}*/

try {
$mysql = new PDO(
    'mysql:host=localhost;dbname=epst;charset=utf8',
    'root',
    ''
);
$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$email=htmlspecialchars($_POST['email']);
$password=htmlspecialchars($_POST['password']);
$nom=htmlspecialchars($_POST['nom']);
$ecole=htmlspecialchars($_POST['school']);
$annee=htmlspecialchars($_POST['annee']);


$stmt = $mysql->prepare("INSERT INTO users (email, password, nom, ecole, annee) VALUES (:email, :password, :nom, :ecole, :annee)");
$stmt->execute([
    'email' => trim($email),
    'password' => trim($password),
    'nom' => trim($nom),
    'ecole' => trim($ecole),
    'annee' => trim($annee),
]);

if (!empty($_POST['email']) && !empty($_POST['password'])){
    header("Location: ../index.php");

    exit;
}
}
catch (Exception $e) {
    echo "Erreur lors de l'enregistrement : " . $e->getMessage();
}