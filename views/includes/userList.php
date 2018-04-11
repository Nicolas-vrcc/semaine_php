<?php
require_once 'functions.php';
$res = $pdo->query('SELECT first_name, ID, location, skills, latitude, longitude, bio, avatar_picture FROM users');
$data = $res->fetchAll();

// deletes the user from the displayed users list
$data = unsetValue($data, 'ID', $_SESSION['auth']->ID);


for($i= 0; $i < count($data); $i++){
  // gets the distance between two users
  $data[$i]->distance = distance($_SESSION['auth']->latitude, $_SESSION['auth']->longitude, $data[$i]->latitude, $data[$i]->longitude);
}
// sorts user list according to distance from user
function cmp($a, $b)
{
    if ($a->distance == $b->distance) {
        return 0;
    }
    return ($a->distance < $b->distance) ? -1 : 1;
}

usort($data, "cmp");

// echo '<pre>';
// var_dump($data);
// echo '</pre>';
?>
<?php foreach ($data as $user): ?>
    <?php
// create an array of skills
$skillsArray = explode(",", $user->skills);
?>
            <div class="card-panel grey lighten-5">
                <div class="row valign-wrapper">
                <div class="col s2">
                <img src=<?=$user->avatar_picture?> alt="user_picture" class="circle responsive-img">
                </div>
                <div class="col s1"></div>
                <div class="col s9">
                <p>à <?=$user->distance?> Kilomètres</h4>
                <h5><?=$user->first_name?></h5>
                <?php foreach ($skillsArray as $skill): ?>
                <div class="checklabel"><?=utf8_decode($skill)?></div>
                <?php endforeach;?>
                <p><?=$user->bio?></p>
                 <a href='hero_profile?id=<?=$user->ID?>' class="btn-floating btn-large waves-effect waves-light red float-right"><i class="material-icons">add</i></a>
                </div>
                </div>
            </div>
            <?php endforeach;?>