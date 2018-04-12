<?php
session_start();
require_once 'views/includes/db.php';
require_once 'views/includes/mail_handler.php';
require_once 'views/includes/functions.php';

require_once 'views/includes/header_dashboard.php';

 
//Get the profile of the current user
$users = $pdo->prepare('SELECT ID,email,first_name,location,skills,avatar_picture,bio,latitude,longitude FROM users WHERE ID = :id');
$users->execute(['id' => $_GET['id']]);
$profil = $users->fetch();

//Get comments and grades from the user concerned by the hero profile
$comments = $pdo->prepare('SELECT users.first_name AS user_name, grades.stars AS stars, grades.comment AS comment FROM users, grades WHERE users.ID = grades.writer_id AND grades.concerned_user_id = :id');
$comments->execute(['id' => $_GET['id']]);
$datas = $comments->fetchAll();

//Get the skills string of the current user
$skills = $profil->skills;
//Convert string of skills into an array to display separately in the folowwing code
$skills = explode(',', $skills);

//Get coordinates
$coord = array($profil->latitude, $profil->longitude);

?>
 
<div class="informations">
  <div class="container informations">
    <div class="row">
      <div class="col s4 profile_photo">
        <div class="photo_container">
          <img class="responsive-img" src="<?= $profil->avatar_picture?>" alt="profile picture">
        </div>
      </div>
      <div class="col s8">
        <p class="location">à <?= distance($_SESSION['auth']->latitude, $_SESSION['auth']->longitude, $profil->latitude, $profil->longitude); ?> Km</p>
        <p class="name"><?= $profil->first_name; ?></p>
        <p class="description"><?= $profil->bio ?></p>
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
          <input id="<?=$_skill?>" class="checkbox" type="checkbox" name="skill[]" value="<?= $_skill?>">
          <label for="<?=$_skill?>" class="checklabel"><?= $_skill?></label>
        <?php endforeach ; ?>
      </div>
        <button data-target="modal1" class="btn modal-trigger waves-effect waves-light" type="submit" name="getSkill">Contacter</button>
      </div>
  </div>
</div>

 <!-- Modal Structure -->
 <div id="modal1" class="modal">
    <div class="modal-content">
      <form action="#" method="post">
      <div class="row"></div>
        <div class="input-field col s6 l6">
          <input placeholder="Subject" name='subject' id="subject" type="text" class="content" required>
          <label for="subject">Subject</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 l12">
          <textarea id="content" name="content" type="text" class="materialize-textarea">Bonjour <?= $name?>, </textarea>
          <label for="content">Content</label>
        </div>
      </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat"><button class='submit' type="submit">submit</button></a>
    </div>
    </form>
  </div>
</div>
 
<div class="container center-align stars">
  <p class="stars">Avis</p>
  <?php foreach($datas as $_data): ?>
  <div class="col s10 offset-s1 card">
    <div class="row">
      <div class="col s2 profile-picture">
        <div class="photo_container">
          <img class="responsive-img" src="/assets/img/marijooj.jpg" alt="profile picture">
        </div>
      </div>
      <div class="col s3 note">
        <p class="name"><?= $_data->user_name; ?></p>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star_border</i>
        <i class="material-icons">star_border</i>
      </div>
      <div class="col s6 valign-wrapper left-align comment">
        <p class="comment"><?= $_data->comment; ?></p>
      </div>
    </div>
  </div>
  <?php endforeach ?>
</div>

<div class="container map">
  <div class="row title">
    <p class="title center-align">Où peut se déplacer votre héros :</p>
  </div>

  <div class="row map">
    <div id="map" class="col s12 center-align"></div>
  </div>
</div>


<script type="text/javascript">
  const coord = <?= json_encode($coord); ?>
</script>
 
 
<?php
require_once 'views/includes/footer.php';
?>