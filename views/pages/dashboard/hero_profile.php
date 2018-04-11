<?php
require_once 'views/includes/db.php';
require_once 'views/includes/header_dashboard.php';

$users = $pdo->prepare('SELECT id,first_name,age,location,skills,avatar_picture,bio FROM users WHERE ID = :id');
$users->execute(['id' => $_GET['id']]);
$profil = $users->fetchAll();

$grades = $pdo->prepare('SELECT * FROM grades WHERE user_id = :id');
$grades->execute(['id' => $_GET['id']]);
$stars = $grades->fetchAll();

foreach($profil as $_profil){ $skills = $_profil->skills; }
//Convert string of skills into an array
$skills = explode(',', $skills);

echo '<pre>';
var_dump($profil);
echo '</pre>';

?>

<?php foreach($profil as $_profil): ?>
<div class="informations">
  <div class="container informations">
    <div class="row">
      <div class="col s4 profile_photo">
        <div class="photo_container">
          <img class="responsive-img" src="https://api.adorable.io/avatars/250/<?= $_profil->first_name?>" alt="profile picture">
        </div>
      </div>
      <div class="col s8">
        <p class="location">Paris <?= $_profil->location; ?>e</p>
        <p class="name"><?= $_profil->first_name; ?></p>
        <p class="age"><?= $_profil->age ?> ans</p>
        <p class="description">Je donne des cours d’anglais pour les tous les niveaux. Né en angleterre je suis complètement billingue.</p>
      </div>
    </div>
  </div>
</div>

<div class="container center-align choice-contact">
  <div class="row">
    <div class="col s8 offset-s2 card">
      <p class="text">Choisissez la catégorie pour laquelle vous avez besoin de ce super-héros avant de le contacter :</p>
      <div class="skills">
        <?php foreach($skills as $_skill): ?>
        <p class="skill"><?= $_skill ?></p>
        <?php endforeach ?>
      </div>
      <div class="price center">
        <p class="amount">30</p>
        <img src="/assets/img/supercoin.svg" alt="Super Coin">
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="action">Contacter</button>
    </div>
  </div>
</div>
<?php endforeach; ?>

<div class="container center-align stars">
  <p class="stars">Avis</p>
  <?php foreach($stars as $_star): ?>
  <div class="col s10 offset-s1 card">
    <div class="row">
      <div class="col s2 profile-picture">
        <div class="photo_container">
          <img class="responsive-img" src="/assets/img/marijooj.jpg" alt="profile picture">
        </div>
      </div>
      <div class="col s3 note">
        <p class="name"><?= $_star->writer_id ?></p>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star_border</i>
        <i class="material-icons">star_border</i>
      </div>
      <div class="col s6 valign-wrapper left-align comment">
        <p class="comment"><?= $_star->comment ?></p>
      </div>
    </div>
  </div>
  <?php endforeach ?>
</div>



<?php
require_once 'views/includes/footer.php';
?>