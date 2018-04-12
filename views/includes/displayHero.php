<?php
$req = $pdo->prepare('SELECT * FROM users INNER JOIN missions ON users.ID = missions.ID_helped WHERE ID_hero = ?');
$req->execute([$_SESSION['auth']->ID]);
$heroList = $req->fetchAll();

?>
<?php if($heroList): ?>
<?php foreach($heroList as $entry): ?>
            <div class="col s12 m10 offset-m1 l6 profilContainer">
                <div class="profilPicture">
                    <img src=<?= $entry->avatar_picture ?> alt="helped_pic" >
                </div>
                <div class="l2 infoContainer ">
                    <p class="locationHero"></p>
                    <p class="nameHero"><?= $entry->first_name ?></p>
                </div>
                <button data-target="modal1" class="btn modal-trigger buttonAbandonMission"><p>Abandon de la mission</p></button>
            </div>
<?php endforeach ?>
<?php else: ?>
<div class="card-panel teal lighten-2">Aucun service en cours pour le moment.</div>
<?php endif; ?>