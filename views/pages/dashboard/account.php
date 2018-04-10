<?php
session_start();
require_once 'views/includes/logged_only.php';
require_once 'views/includes/db.php';
$res = $pdo->query('SELECT first_name, ID, location, skills FROM users');
$data = $res->fetchAll();
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
            <div class="input-field col s4">
                <select>
                    <option value="" disabled selected>Catégorie</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>
            <div class="input-field col s4">
                <select>
                    <option value="" disabled selected>Lieux</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>
            <div class="input-field col s4">
                <select>
                    <option value="" disabled selected>Crédits</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
            <?php foreach($data as $user): ?>
            <div class="card-panel grey lighten-5">
                <div class="row valign-wrapper">
                <div class="col s2">
                <img src="http://lorempicsum.com/simpsons/255/200/2" alt="user_picture" class="circle responsive-img">
                </div>
                <div class="col s1"></div>
                <div class="col s9">
                <p><?= $user->location ?></h4>
                <h4><?= $user->first_name ?></h4>
                 <a href='hero_profile?id=<?= $user->ID ?>' class="btn-floating btn-large waves-effect waves-light red float-right"><i class="material-icons">add</i></a>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'views/includes/footer.php';
?>
