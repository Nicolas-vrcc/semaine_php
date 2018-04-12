<?php
session_start();
require_once 'views/includes/logged_only.php';
require_once 'views/includes/db.php';
require_once 'views/includes/update_auth.php';

if (isset($_GET['mission'])) {
    $req = $pdo->prepare('DELETE FROM missions WHERE ID = ?');
    $req->execute([$_GET['mission']]);
}
require_once 'views/includes/header_dashboard.php';
?>
<div class="container">
<div class="row">
<div class="card-panel teal lighten-2">La mission a bien été supprimée.</div>
</div>
<div class="row">
<div class="col s12 center-align">
<a href="/dashboard/profile" class="waves-effect waves-light btn-large"><i class="material-icons left">perm_identity</i>Retour au Profil</a>
</div>
</div>
</div>
<?php
require_once 'views/includes/footer.php'
?>
