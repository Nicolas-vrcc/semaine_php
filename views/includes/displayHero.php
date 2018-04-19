<?php
$req = $pdo->prepare('SELECT * FROM users INNER JOIN missions ON users.ID = missions.ID_hero WHERE ID_helped = ?');
$req->execute([$_SESSION['auth']->ID]);
$heroList = $req->fetchAll();

?>
<?php if($heroList): ?>
<?php foreach($heroList as $entry): ?>
            <div class="col s12 m10 offset-m1 l6 profilContainer">
                <div class="profilPicture">
                    <img class="profilPicture" src=<?= $entry->avatar_picture ?> alt="helped_pic" >
                </div>
                <div class="l2 infoContainer ">
                    <p class="locationHero"></p>
                    <p class="nameHero"><?= $entry->first_name ?></p>
                </div>
                <button data-target="<?= $entry->ID ?>" class="btn modal-trigger buttonAbandonMission"><p>Abandon de la mission</p></button>
            </div>
<div id="<?= $entry->ID ?>" class="modal modalAbandon">
    <div class="modal-content">
        <h3 class="sub_title_popup bangers">Abandonner la mission</h3>
        <p class="content_popup">Voulez-vous réellement abandonner cette mission ?</p>
        <button class="btn btn_validate_popup waves-effect waves-light buttonAction" type="#" name="action"><p class="buttonElement"><a href="/dashboard/abort?mission=<?= $entry->ID ?>">Oui</a></p></button>
        <button class="modal-action modal-close waves-effect waves-green btn-flat" type="#" name="action">Annuler</button>
    </div>
</div>
<?php endforeach ?>
<?php else: ?>
<div class="card-panel teal lighten-2">Aucun service en cours pour le moment.</div>
<?php endif; ?>