<?php
$req = $pdo->prepare('SELECT * FROM users INNER JOIN missions ON users.ID = missions.ID_helped WHERE ID_hero = ?');
$req->execute([$_SESSION['auth']->ID]);
$helperList = $req->fetchAll();

?>
<?php if($helperList): ?>
<?php foreach($helperList as $entry): ?>
            <div class="col s12 m10 offset-m1 l6 profilContainer">
                <div class="profilPicture">
                    <img class="profilPicture" src=<?= $entry->avatar_picture ?> alt="helped" >
                </div>
                <div class="infoContainer">
                    <p class="locationHero"></p>
                    <p class="nameHero"><?= $entry->first_name ?></p>
                </div>
                <div class="button">
                    <button data-target="p<?= $entry->ID ?>" class="btn modal-trigger buttonValidate"><p>Mission accomplie</p></button>
                    <button data-target="c<?= $entry->ID ?>" class="btn modal-trigger buttonAbandon"><p>Abandon de la mission</p></button>
                </div>
            </div>
<!-- Modal cancel -->
<div id="c<?= $entry->ID ?>" class="modal modalAbandon">
    <div class="modal-content">
        <h3 class="sub_title_popup bangers">Abandonner la mission</h3>
        <p class="content_popup">Voulez-vous réellement abandonner cette mission ?</p>
        <button class="btn btn_validate_popup waves-effect waves-light buttonAction" type="#" name="action"><p class="buttonElement"><a href="/dashboard/abort?mission=<?= $entry->ID ?>">Oui</a></p></button>
        <button class="modal-action modal-close waves-effect waves-green btn-flat" type="#" name="action">Annuler</button>
    </div>
</div>
<!-- Modal pay -->
<div id="p<?= $entry->ID ?>" class="modal modalValidate">
    <div class="modal-content">
        <h3 class="sub_title_popup bangers">Mission accomplie !</h3>
        <div class="content_popup">
            <p>Votre super-héros a bien accompli son travail, il faut le récompenser en SuperCoins !</p>
            <p><b>Choisissez le montant</b></p>
            <div class="price row">
            <form id="main" action="/dashboard/pay" method="post">
                <input name="mission_ID" type="hidden" value="<?= $entry->ID ?>">
                <input name="hero_ID" type="hidden" value="<?= $entry->ID_helped ?>">
                <input id="cost" type="number" name="cost" class="cost col s5" required>
                <img src="../../../../assets/img/supercoin.svg" alt="superCoins" class="cost col s3 l2">
            </div>
            <button type="submit" form="main" class="waves-effect waves-green btn-flat">Submit</button>
            <button class="modal-action modal-close waves-effect waves-green btn-flat" type="#" name="action">Annuler</button>
        </form>
        </div>    
    </div>
</div>
<?php endforeach ?>
<?php else: ?>
<div class="card-panel teal lighten-2">Vous ne réalisez aucun service pour le moment.</div>
<?php endif; ?>