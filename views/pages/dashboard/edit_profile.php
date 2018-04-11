<?php
require_once 'views/includes/db.php';
require_once 'views/includes/header_dashboard.php';

echo '<pre>';
var_dump($_POST);
echo '</pre>';
?>


<div class="container title_edit_profil">
    <h1 class="center bangers">Modifiez notre profil de super-héros</h1>
</div>

<div class="container">

    <div class="row form">
        <div class="col s3 photo_edit">
            <div class="photo_container_edit valign-wrapper">
                <img class="responsive-img" src="/assets/img/marijooj.jpg" alt="profile picture">
            </div>
        </div>
        <div class="col s9 content_form">
            <h3 class="sub_title bangers">Informations</h3>
        </div>
        <form action="#" method="post" class="edit">
            <div class="input-field col s4">
              <input id="name" type="text" class="validate">
              <label for="name">Nom</label>
            </div>
            <div class="input-field col s4 offset-s1">
              <input id="first_name" type="text" class="validate">
              <label for="first_name">Prénom</label>
            </div>
            <div class="input-field col s1">
              <input id="age" type="number" class="validate">
              <label for="age">Age</label>
            </div>
            <div class="input-field col s2 offset-s1">
              <input id="location" type="number" class="validate">
              <label for="location">Lieu</label>
            </div>

            <div class="col s9 content_form">
                <h3 class="sub_title bangers">Super-pouvoirs</h3>
                <? require_once 'checkbox.php';?>
            </div>

            <div class="col s9 content_form offset-s3">
                <h3 class="sub_title bangers">Description</h3>
            </div>
            <div class="input-field col s9 offset-s3">
              <input id="description" type="text" class="validate">
              <label for="description">Description</label>
            </div>
            <div class="input-field col s4 offset-s3">
                <button class="btn btn_validate waves-effect waves-light" type="submit" name="action">Valider</button>
            </div>
        </form>
    </div>
</div>


<?php
require_once 'views/includes/footer.php';
?>