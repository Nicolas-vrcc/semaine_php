<?php
session_start();
require_once 'views/includes/logged_only.php';
require_once 'views/includes/db.php';
require_once 'views/includes/header_dashboard.php';
require_once 'views/includes/update_auth.php';

$skills = explode(',', $_SESSION['auth']->skills);
?>
<!-- INTRODUCTION PROFILE - START -->
<div class="my_profil">
<div class="container my_profil">
    <div class="row">
        <div class="col s7 m4 l4 my_profile_photo">
            <div class="photo_container">
                <img class="responsive-img" src="<?=$_SESSION['auth']->avatar_picture;?>" alt="profile picture">
            </div>
            <div class="buttonEdit">
                <a class="waves-effect waves-light btn-large" href="edit_profile"><p>Modifier mon profil</p></a>
            </div>
        </div>
        <div class="col s12 m7 offset-m1 l7 offset-l1 profilSummary">
            <p class="location"><?= $_SESSION['auth']->location ?></p>
            <p class="name"><?= $_SESSION['auth']->first_name;?></p>
            <div class="skills">
                <?php foreach($skills as $_skill): ?>
                    <p class="skill"><?= utf8_decode($_skill) ?></p>
                <?php endforeach ?>
          </div>
            <p class="description">Description: <?= utf8_decode($_SESSION['auth']->bio);?></p>
            <div class="price">
                <p class="money_element">Mon solde est de</p>
                <p class="amount"><?= $_SESSION['auth']->token ?></p>
                <img src="/assets/img/supercoin.svg" alt="Super Coin">
            </div>
        </div>
    </div>
</div>
</div>
<!-- INTRODUCTION PROFILE - END -->
<div class="profilElement">
<!-- MISSION - START -->
<div class="heroContainer">
    <div class="container">
        <div class="row">
            <h2>Je suis leur super-héros</h2>
            <?php require_once 'views/includes/displayHero.php'; ?>
        </div>
    </div>
</div>
<!-- MISSION - END -->
<!-- HELP - START -->
<div class="helpContainer">
    <div class="container">
        <div class="row">
            <h2>Ils sont mes super-héros</h2>
            <div class="col s12 m10 offset-m1 l6 profilContainer">
                <div class="profilPicture">
                    <img src="" alt="" >
                </div>
                <div class="infoContainer">
                    <p class="locationHero">Paris - 18</p>
                    <p class="nameHero">Claude Durluk</p>
                </div>
                <div class="button">
                    <button data-target="modal2" class="btn modal-trigger buttonValidate"><p>Mission accomplie</p></button>
                    <button data-target="modal1" class="btn modal-trigger buttonAbandon"><p>Abandon de la mission</p></button>
                </div>
            </div>
            <div class="col s12 m10 offset-m1 l6 profilContainer">
                <div class="profilPicture">
                    <img src="" alt="" >
                </div>
                <div class="infoContainer">
                    <p class="locationHero">Paris - 16</p>
                    <p class="nameHero">Juliette Pititou</p>
                </div>
                <div class="button">
                <button data-target="modal2" class="btn modal-trigger buttonValidate"><p>Mission accomplie</p></button>
                    <button data-target="modal1" class="btn modal-trigger buttonAbandon"><p>Abandon de la mission</p></button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- HELP - END -->
<!-- POP UP - START -->
<!-- POP UP ABANDON - START -->
<div id="modal1" class="modal modalAbandon">
    <div class="modal-content">
        <h3 class="sub_title_popup bangers">Abandonner la mission</h3>
        <p class="content_popup">Voulez-vous réellement abandonner cette mission ?</p>
        <button class="btn btn_validate_popup waves-effect waves-light buttonAction" type="#" name="action"><p class="buttonElement">Oui</p></button>
        <button class="modal-action modal-close waves-effect waves-green btn-flat" type="#" name="action">Annuler</button>
    </div>
</div>
<!-- POP UP ABANDON - END -->
<!-- POP UP VALIDATE - START -->
<div id="modal2" class="modal modalValidate">
    <div class="modal-content">
        <h3 class="sub_title_popup bangers">Mission accomplie !</h3>
        <div class="content_popup">
            <p>Votre super-héros a bien accompli son travail, il faut le récompenser en SuperCoins !</p>
            <p><b>Choisissez le montant</b></p>
            <div class="price row">
                <input id="cost" type="number" class="cost col s5">
                <img src="../../../../assets/img/supercoin.svg" alt="superCoins" class="cost col s3 l2">
            </div>
            <button class="btn btn_validate_popup waves-effect waves-light buttonAction" type="#" name="action"><p class="buttonElement">Valider</p></button>
            <button class="modal-action modal-close waves-effect waves-green btn-flat" type="#" name="action">Annuler</button>
        </div>    
    </div>
</div>
<!-- POP UP VALIDATE - END -->

<?php
require_once 'views/includes/footer.php';
?>
<!-- MY PROFILE - END -->