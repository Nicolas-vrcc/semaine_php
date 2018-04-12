<?php
session_start();
require_once 'views/includes/logged_only.php';
require_once 'views/includes/header_dashboard.php';
require_once 'views/includes/update_auth.php';
?>
<div class="container">
<div class="row">
<div class="card-panel green lighten-2">Votre demande a bien été soumise.</div>
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