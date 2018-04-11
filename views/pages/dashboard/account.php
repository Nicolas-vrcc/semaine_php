<?php
session_start();
require_once 'views/includes/logged_only.php';
require_once 'views/includes/db.php';

// var_dump($data);
var_dump($_SESSION['auth']);
require_once 'views/includes/header_dashboard.php';
?>
<div class="container">
    <div class="row">
        <div class="col s12"></div>
            <h2 class="bangers center-align">Trouvez votre super-héros près de chez vous.</h2>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">search</i>
                <input id="icon_prefix" type="text" class="validate">
                <label for="icon_prefix">Rechercher votre Héros</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <select>
                    <option value="" disabled selected>Catégorie</option>
                    <?php require_once 'views/includes/displayCategory.php' ?>
                </select>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="" disabled selected>Distance</option>
                    <option value="d1">Moins de 5Km</option>
                    <option value="d2">Moins de 10Km</option>
                    <option value="d3">Moins de 30Km</option>
                    <option value="d3">Tout</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
            <?php require_once 'views/includes/userList.php' ;?>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'views/includes/footer.php';
?>
