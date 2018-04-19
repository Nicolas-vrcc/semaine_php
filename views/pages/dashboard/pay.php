<?php
session_start();
require_once 'views/includes/db.php';
require_once 'views/includes/logged_only.php';
require_once 'views/includes/update_auth.php';
if(isset($_POST['cost']) && isset($_POST['mission_ID']) && isset($_POST['hero_ID'])){

$cost = $_POST['cost'];
$cost = (int)$cost;

// checks if the user has the money
$req = $pdo->prepare('SELECT token FROM users WHERE ID = ?');
$req->execute([$_SESSION['auth']->ID]);
$tokens = $req->fetch();
$req->closeCursor();

if($tokens->token >= $cost){

// takes the money from the helped person
$req = $pdo->prepare('UPDATE users SET token = token - ? WHERE ID = ?');
$req->execute([$cost, $_SESSION['auth']->ID]);

// gives money to the hero
$req = $pdo->prepare('UPDATE users SET token = token + ? WHERE ID = ?');
$req->execute([$cost, $_POST['hero_ID']]);

// deletes mission
$req = $pdo->prepare('DELETE FROM missions WHERE ID = ?');
$req->execute([$_POST['mission_ID']]);
header('Location: /dashboard/success');

}else{
    $error = "Vous n avez pas assez de tokens. Devenez un super héros pour en gagner plus.";
}
require_once 'views/includes/header_dashboard.php';
}
?>
<?php if(isset($error)): ?>
<div class="container">
<div class="row">
<div class="card-panel red lighten-2"><?= $error ?></div>
</div>
<div class="row">
<div class="col s12 center-align">
<a href="/dashboard/profile" class="waves-effect waves-light btn-large"><i class="material-icons left">perm_identity</i>Retour au Profil</a>
</div>
</div>
</div>
<?php else: ?>
<div class="container">
<div class="row">
<div class="card-panel green lighten-2">Transaction réussie.</div>
</div>
<div class="row">
<div class="col s12 center-align">
<a href="/dashboard/profile" class="waves-effect waves-light btn-large"><i class="material-icons left">perm_identity</i>Retour au Profil</a>
</div>
</div>
</div>
<?php endif; ?>
<?php
require_once 'views/includes/footer.php'
?>


