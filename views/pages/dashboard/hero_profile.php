<?php
require_once 'views/includes/db.php';
require_once 'views/includes/header_dashboard.php';
?>

<div class="informations">
  <div class="container informations">
    <div class="row">
      <div class="col s4 profile_photo">
        <div class="photo_container">
          <img class="responsive-img" src="/assets/img/marijooj.jpg" alt="profile picture">
        </div>
      </div>
      <div class="col s8">
        <p class="location">Paris 6e</p>
        <p class="name">Jaaj Marijooj</p>
        <p class="age">60 ans</p>
        <p class="description">Je donne des cours d’anglais pour les tous les niveaux. Né en angleterre je suis complètement billingue.</p>
      </div>
    </div>
  </div>
</div>

<div class="container center-align choice-contact">
  <div class="row">
    <div class="col s8 offset-s2 card">
      <p class="text">Choisissez la catégorie pour laquelle vous avez besoin de ce super-héros avant de le contacter.</p>
      <div class="skills">
        <p class="skill">Cours</p>
        <p class="skill">Garde d'enfants</p>
      </div>
      <div class="price center">
        <p class="amount">30</p>
        <img src="/assets/img/supercoin.svg" alt="Super Coin">
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="action">Contacter</button>
    </div>
  </div>
</div>

<div class="container center-align stars">
  <p class="stars">Avis</p>
  <div class="col s10 offset-s1 card">
    <div class="row">
      <div class="col s2 profile-picture">
        <div class="photo_container">
          <img class="responsive-img" src="/assets/img/marijooj.jpg" alt="profile picture">
        </div>
      </div>
      <div class="col s3 note">
        <p class="name">Paul Ducul</p>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star</i>
        <i class="material-icons">star_border</i>
        <i class="material-icons">star_border</i>
      </div>
      <div class="col s6 valign-wrapper left-align comment">
        <p class="comment">Bon cours mais pas assez complets à mon goût ! J'ai du apprendre à fuuf la jeej tout seul...</p>
      </div>
    </div>
  </div>
</div>



<?php
require_once 'views/includes/footer.php';
?>