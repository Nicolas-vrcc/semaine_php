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
            <p class="description">Description: <?= $_SESSION['auth']->bio;?></p>
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
        <?php require_once 'views/includes/displayHelped.php' ?>
        </div>
    </div>
</div>
</div>
<?php
require_once 'views/includes/footer.php';
?>
<!-- MY PROFILE - END -->