<?php
// display list of missions where you're helped for and that are still not done
$req = $pdo->prepare('SELECT * FROM missions WHERE ID_hero = ? AND status = ?');
$req->execute([$_SESSION['auth']->ID,'waiting']);
$heroList = $req->fetchAll();

var_dump($heroList);

?>
<?php foreach($heroList as $entry): ?>
            <div class="col s12 m10 offset-m1 l6 profilContainer">
                <div class="profilPicture">
                    <img src="" alt="" >
                </div>
                <div class="l2 infoContainer ">
                    <p class="locationHero">Paris - 18</p>
                    <p class="nameHero">Claude Durluk-virolototo</p>
                </div>
                <button data-target="modal1" class="btn modal-trigger buttonAbandonMission"><p>Abandon de la mission</p></button>
            </div>
<?php endforeach; ?>