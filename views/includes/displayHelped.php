<?php
$req = $pdo->prepare('SELECT * FROM users INNER JOIN missions ON users.ID = missions.ID_hero WHERE ID_helped = ?');
$req->execute([$_SESSION['auth']->ID]);
$helperList = $req->fetchAll();
?>
<?php if($heroList): ?>
<?php foreach($helperList as $entry): ?>
            <div class="col s12 m10 offset-m1 l6 profilContainer">
                <div class="profilPicture">
                    <img src=<?= $entry->avatar_picture ?> alt="helped" >
                </div>
                <div class="infoContainer">
                    <p class="locationHero"></p>
                    <p class="nameHero"><?= $entry->first_name ?></p>
                </div>
                <div class="button">
                    <button data-target="modal2" class="btn modal-trigger buttonValidate"><p>Mission accomplie</p></button>
                    <button data-target="modal1" class="btn modal-trigger buttonAbandon"><p>Abandon de la mission</p></button>
                </div>
            </div>
<?php endforeach ?>
<?php else: ?>
<div class="card-panel teal lighten-2">Vous ne réalisez aucun service pour le moment.</div>
<?php endif; ?>