<?php
session_start();
require_once 'views/includes/logged_only.php';
require_once 'views/includes/db.php';
require_once 'views/includes/update_auth.php';
require_once 'views/includes/header_dashboard.php';


?>
<div class="account">
  <div class="container">
      <div class="row">
          <div class="col s12"></div>
              <h2 class="bangers center-align">Trouvez votre super-héros près de chez vous.</h2>
          </div>
          <form action="#" method="get" id="formQuery">
            <div class="row">
              <div class="input-field col s12">
                  <i class="material-icons prefix">search</i>
                  <input id="icon_prefix" type="text" name="query" class="validate">
                  <label for="icon_prefix">Rechercher un Service</label>
              </div>
            </div>
          <!-- <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
          </button>
          </form>
          <form action="#" method="get" id="formCat"> -->
          <div class="row">
              <div class="input-field col s6">
                  <select name='selectCategory'>
                      <option value="" disabled selected>Catégorie</option>
                      <?php require_once 'views/includes/displayCategory.php' ?>
                  </select>
              </div>
              <div class="input-field col s6">
                  <select name='selectDistance'>
                      <option value="" disabled selected>Distance</option>
                      <option value="d1">Moins de 5Km</option>
                      <option value="d2">Moins de 10Km</option>
                      <option value="d3">Moins de 30Km</option>
                      <option value="d4">Tout</option>
                  </select>
              </div>
              <button class="btn waves-effect waves-light " type"submit" name="action">Chercher
                <i class="material-icons right">send</i>
              </button>
          </div>
          </form>
          <div class="row">
              <div class="col s12">
                <?php require_once 'views/includes/userList.php' ;?>
              </div>
          </div>
      </div>
  </div>
</div>
<?php
require_once 'views/includes/footer.php';
?>
